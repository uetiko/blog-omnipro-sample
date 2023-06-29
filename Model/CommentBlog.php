<?php

namespace Omnipro\Blog\Model;

use Omnipro\Blog\Api\Data\CommentBlogInterface;

class CommentBlog extends AbstractModelOmnipro implements CommentBlogInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\CommentBlog::class);
    }

    public function getId(): ?int
    {
        return $this->getDataByKey(static::ID);
    }

    public function getArticleId(): int
    {
        return (int)$this->getDataByKey(static::ARTICLE_ID);
    }

    public function setArticleId(int $articleId): CommentBlogInterface
    {
        return $this->setData(static::ARTICLE_ID, $articleId);
    }

    public function getCustomerId(): int
    {
        return (int)$this->getDataByKey(static::CUSTOMER_ID);
    }

    public function setCustomerId(int $customerId): CommentBlogInterface
    {
        return $this->setData(static::CUSTOMER_ID, $customerId);
    }

    public function getCommentContent(): string
    {
        return $this->getDataByKey(static::COMMENT_CONTENT);
    }

    public function setCommentContent(string $commentContent): CommentBlogInterface
    {
        return $this->setData(static::COMMENT_CONTENT, $commentContent);
    }
}
