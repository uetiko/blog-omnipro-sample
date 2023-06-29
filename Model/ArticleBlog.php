<?php

namespace Omnipro\Blog\Model;

use Omnipro\Blog\Api\Data\ArticleBlogInterface;

class ArticleBlog extends AbstractModelOmnipro implements ArticleBlogInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\ArticleBlog::class);
    }

    public function getId(): ?int
    {
        return $this->getDataByKey(static::ID);
    }

    public function getCategoryId(): int
    {
        return (int)$this->getDataByKey(static::CATEGORY_ID);
    }

    public function setCategoryId(int $categoryId): ArticleBlogInterface
    {
        return $this->setData(static::CATEGORY_ID, $categoryId);
    }

    public function getUserId(): int
    {
        return (int)$this->getDataByKey(static::USER_ID);
    }

    public function setUserId(int $userId): ArticleBlogInterface
    {
        return $this->setData(static::USER_ID, $userId);
    }

    public function getArticleTitle(): string
    {
        return $this->getDataByKey(static::ARTICLE_TITLE);
    }

    public function setArticleTitle(string $articleTitle): ArticleBlogInterface
    {
        return $this->setData(static::ARTICLE_TITLE, $articleTitle);
    }

    public function getArticleContent(): string
    {
        return $this->getDataByKey(static::ARTICLE_CONTENT);
    }

    public function setArticleContent(string $articleContent): ArticleBlogInterface
    {
        return $this->setData(static::ARTICLE_CONTENT, $articleContent);
    }
}
