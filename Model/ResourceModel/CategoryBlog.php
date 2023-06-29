<?php

namespace Omnipro\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Omnipro\Blog\Api\Data\CategoryBlogInterface;

class CategoryBlog extends AbstractDb
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            CategoryBlogInterface::TABLE_NAME,
            CategoryBlogInterface::ID
        );
    }
}
