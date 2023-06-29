<?php

namespace Omnipro\Blog\Model;

use DateTime;
use DateTimeZone;
use Omnipro\Blog\Api\Data\CategoryBlogInterface;

class CategoryBlog extends AbstractModelOmnipro implements CategoryBlogInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\CategoryBlog::class);
    }

    public function getId(): ?int
    {
        return $this->getDataByKey(static::ID);
    }

    public function getCategoryName(): string
    {
        return $this->getDataByKey(static::CATEGORY_NAME);
    }

    public function setCategoryName(string $categoryName): CategoryBlogInterface
    {
        return $this->setData(static::CATEGORY_NAME, $categoryName);
    }

    public function getCategoryDescription(): string
    {
        return $this->getDataByKey(static::CATEGORY_DESCRIPTION);
    }

    public function setCategoryDescription(string $categoryDescription): CategoryBlogInterface
    {
        return $this->setData(static::CATEGORY_DESCRIPTION, $categoryDescription);
    }
}
