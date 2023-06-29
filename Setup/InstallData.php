<?php
declare(strict_types=1);

namespace Omnipro\Blog\Setup;

use Magento\Authorization\Model\Acl\Role\Group;
use Magento\Authorization\Model\RoleFactory;
use Magento\Authorization\Model\RulesFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Authorization\Model\UserContextInterface;
use Omnipro\Blog\Api\Data\BlogModelInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface, BlogModelInterface
{
    protected RoleFactory $roleFactory;
    protected RulesFactory $rulesFactory;

    public function __construct(
        RoleFactory $roleFactory,
        RulesFactory $rulesFactory
    ) {
        $this->roleFactory = $roleFactory;
        $this->rulesFactory = $rulesFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $role = $this->roleFactory->create();
        $role->setName(static::BLOG_ROLE)
            ->setPid(0)
            ->setRoleType(Group::ROLE_TYPE)
            ->setUserType(UserContextInterface::USER_TYPE_ADMIN);
        $role->save();
        $rules = $this->rulesFactory->create();
        $rules->setRoleId(
            $role->getId()
        )->setResources(
            [
                'Magento_Backend::admin',
                'Omnipro_Blog::blog',
                'OmniPro_Blog::post',
                'OmniPro_Blog::post_create',
                'OmniPro_Blog::post_edit',
                'OmniPro_Blog::post_delete',
            ])->saveRel();
        $setup->endSetup();
    }
}
