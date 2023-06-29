<?php

namespace Omnipro\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Omnipro\Blog\Api\Data\ArticleBlogInterface;

class ArticleBlog extends AbstractDb
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            ArticleBlogInterface::TABLE_NAME,
            ArticleBlogInterface::ID
        );
    }
}
