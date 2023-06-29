<?php

namespace Omnipro\Blog\Api\Data;

use DateTime;

interface CategoryBlogInterface extends BlogModelDateTimeInterface
{
    public const TABLE_NAME = 'category_blog';
    public const ID = 'id';
    public const CATEGORY_NAME = 'category_name';
    public const CATEGORY_DESCRIPTION = 'category_description';

    public function getId(): ?int;
    public function getCategoryName(): string;
    public function setCategoryName(string $categoryName): CategoryBlogInterface;
    public function getCategoryDescription(): string;
    public function setCategoryDescription(string $categoryDescription): CategoryBlogInterface;
}
