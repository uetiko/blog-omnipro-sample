<?php

namespace Omnipro\Blog\Api\Data;

interface ArticleBlogInterface extends BlogModelDateTimeInterface
{
    public const TABLE_NAME = 'article_blog';
    public const ID = 'id';
    public const CATEGORY_ID = 'category_id';
    public const USER_ID = 'user_id';
    public const ARTICLE_TITLE = 'article_title';
    public const ARTICLE_CONTENT = 'article_content';

    public function getId(): ?int;
    public function getCategoryId(): int;
    public function setCategoryId(int $categoryId): ArticleBlogInterface;
    public function getUserId(): int;
    public function setUserId(int $userId): ArticleBlogInterface;
    public function getArticleTitle(): string;
    public function setArticleTitle(string $articleTitle): ArticleBlogInterface;
}
