<?php

namespace Omnipro\Blog\Model\ResourceModel\CommentBlog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Omnipro\Blog\Model\CommentBlog as CommentBlogModel;
use Omnipro\Blog\Model\ResourceModel\CommentBlog as CommentBlogResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            CommentBlogModel::class,
            CommentBlogResource::class
        );
    }
}
