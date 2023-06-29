<?php

namespace Omnipro\Blog\Api\Data;

interface BlogModelInterface
{
    public const BLOG_ROLE = 'bloggers';
    public const ARTICLE_BLOG_TABLE = 'omnipro_blog_article';
    public const CATEGORY_BLOG_TABLE = 'omnipro_blog_category';
    public const COMMENT_BLOG_TABLE = 'omnipro_blog_comment';
    public const ADMIN_USER_TABLE = 'admin_user';
    public const CUSTOMER_ENTITY_TABLE = 'customer_entity';
}
