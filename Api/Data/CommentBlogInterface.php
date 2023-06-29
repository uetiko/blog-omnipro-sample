<?php

namespace Omnipro\Blog\Api\Data;

interface CommentBlogInterface extends BlogModelDateTimeInterface
{
    public const TABLE_NAME = BlogModelInterface::COMMENT_BLOG_TABLE;
    public const ID = 'id';
    public const ARTICLE_ID = 'article_id';
    public const CUSTOMER_ID = 'entity_id';
    public const COMMENT_CONTENT = 'comment_content';

    public function getId(): ?int;
    public function getArticleId(): int;
    public function setArticleId(int $articleId): CommentBlogInterface;
    public function getCustomerId(): int;
    public function setCustomerId(int $customerId): CommentBlogInterface;
    public function getCommentContent(): string;
    public function setCommentContent(string $commentContent): CommentBlogInterface;
}
