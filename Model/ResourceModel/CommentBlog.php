<?php

namespace Omnipro\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Omnipro\Blog\Api\Data\CommentBlogInterface;

class CommentBlog extends AbstractDb
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            CommentBlogInterface::TABLE_NAME,
            CommentBlogInterface::ID
        );
    }
}
