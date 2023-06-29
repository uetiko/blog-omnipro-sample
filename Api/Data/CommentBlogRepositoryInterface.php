<?php

namespace Omnipro\Blog\Api\Data;

use Omnipro\Blog\Model\ResourceModel\CommentBlog\Collection;

interface CommentBlogRepositoryInterface
{
    public function getById(int $id): CommentBlogInterface;
    public function save(CommentBlogInterface $commentBlog): CommentBlogInterface;
    public function delete(CommentBlogInterface $commentBlog): void;
    public function getList(): Collection;
}
