<?php

namespace Omnipro\Blog\Api\Data;

use Omnipro\Blog\Model\ResourceModel\ArticleBlog\Collection;

interface ArticleBlogRepositoryInterface
{
    public function getById($id): ArticleBlogInterface;
    public function save(ArticleBlogInterface $article): ArticleBlogInterface;
    public function delete(ArticleBlogInterface $article): void;
    public function getList(): Collection;
}
