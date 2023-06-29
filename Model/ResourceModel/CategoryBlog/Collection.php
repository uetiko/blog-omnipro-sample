<?php

namespace Omnipro\Blog\Model\ResourceModel\CategoryBlog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Omnipro\Blog\Model\CategoryBlog as CategoryBlogModel;
use Omnipro\Blog\Model\ResourceModel\CategoryBlog as CategoryBlogResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            CategoryBlogModel::class,
            CategoryBlogResource::class
        );
    }
}
