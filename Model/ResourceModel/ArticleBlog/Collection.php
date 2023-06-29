<?php

namespace Omnipro\Blog\Model\ResourceModel\ArticleBlog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Omnipro\Blog\Model\ArticleBlog as ArticleBlogModel;
use Omnipro\Blog\Model\ResourceModel\ArticleBlog as ArticleBlogResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            ArticleBlogModel::class,
            ArticleBlogResource::class
        );
    }
}
