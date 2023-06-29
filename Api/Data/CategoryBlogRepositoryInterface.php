<?php

namespace Omnipro\Blog\Api\Data;

use Omnipro\Blog\Api\Data\CategoryBlogInterface;
use Omnipro\Blog\Model\ResourceModel\CategoryBlog\Collection;

interface CategoryBlogRepositoryInterface
{
    public function getById(int $id): CategoryBlogInterface;
    public function save(CategoryBlogInterface $categoryBlog): CategoryBlogInterface;
    public function delete(CategoryBlogInterface $categoryBlog): void;
    public function getList(): Collection;
}
