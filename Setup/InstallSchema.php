<?php

namespace Omnipro\Blog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Omnipro\Blog\Api\Data\BlogModelInterface;

class InstallSchema implements InstallSchemaInterface, BlogModelInterface
{

    /**
     * @inheritDoc
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->createBlogTables($setup);
        $this->addForeignKeys($setup);
        $setup->endSetup();
    }

    /**
     * @param SchemaSetupInterface $setup
     * @return void
     * @throws \Zend_Db_Exception
     */
    protected function createBlogTables(SchemaSetupInterface $setup): void
    {
        if (false === $setup->tableExists(static::CATEGORY_BLOG_TABLE)) {
            $blogCategory = $setup->getConnection()->newTable(
                $setup->getTable(static::CATEGORY_BLOG_TABLE)
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'Category Blog Id'
            )->addColumn(
                'category_name',
                Table::TYPE_TEXT,
                80,
                ['nullable' => false],
                'Category Name'
            )->addColumn(
                'category_description',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Category Description'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT,
                ],
                'Created At'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT_UPDATE,
                ],
                'Updated At'
            )->setComment('Category Blog Table');
            $setup->getConnection()->createTable($blogCategory);
        }
        if (false === $setup->tableExists(static::ARTICLE_BLOG_TABLE)) {
            $articleTable = $setup->getConnection()->newTable(
                $setup->getTable(static::ARTICLE_BLOG_TABLE)
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'Article Blog Id'
            )->addColumn(
                'category_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true,
                ],
                'FK to blog category table'
            )->addColumn(
                'user_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true,
                ],
                'FK to Admin user table'
            )->addColumn(
                'article_title',
                Table::TYPE_TEXT,
                80,
                ['nullable' => false],
                'Article Title'
            )->addColumn(
                'article_content',
                Table::TYPE_TEXT,
                '64k',
                ['nullable' => false],
                'Article Content'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT,
                ],
                'Created At'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT_UPDATE,
                ],
                'Updated At'
            )->setComment('Article Blog Table');
            $setup->getConnection()->createTable($articleTable);
        }
        if (false === $setup->tableExists(static::COMMENT_BLOG_TABLE)) {
            $commentTable = $setup->getConnection()->newTable(
                $setup->getTable(static::COMMENT_BLOG_TABLE)
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'Comment Blog Id'
            )->addColumn(
                'article_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true,
                ],
                'FK to blog article table'
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'unsigned' => true,
                ],
                'FK to customer table'
            )->addColumn(
                'comment_content',
                Table::TYPE_TEXT,
                '64k',
                ['nullable' => false],
                'Comment Content'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT,
                ],
                'Created At'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                [
                    'nullable' => false,
                    'default' => Table::TIMESTAMP_INIT_UPDATE,
                ],
                'Updated At'
            )->setComment('Comment Blog Table');
            $setup->getConnection()->createTable($commentTable);
        }
    }

    protected function addForeignKeys(SchemaSetupInterface $setup): void
    {
        $setup->getConnection()->addForeignKey(
            $setup->getFkName(
                static::ARTICLE_BLOG_TABLE,
                'category_id',
                static::CATEGORY_BLOG_TABLE,
                'id'
            ),
            $setup->getTable(static::ARTICLE_BLOG_TABLE),
            'category_id',
            $setup->getTable(static::CATEGORY_BLOG_TABLE),
            'id',
            Table::ACTION_CASCADE
        );
        $setup->getConnection()->addForeignKey(
            $setup->getFkName(
                static::ARTICLE_BLOG_TABLE,
                'user_id',
                static::ADMIN_USER_TABLE,
                'user_id'
            ),
            $setup->getTable(static::ARTICLE_BLOG_TABLE),
            'user_id',
            $setup->getTable(static::ADMIN_USER_TABLE),
            'user_id',
            Table::ACTION_CASCADE
        );
        $setup->getConnection()->addForeignKey(
            $setup->getFkName(
                static::COMMENT_BLOG_TABLE,
                'article_id',
                static::ARTICLE_BLOG_TABLE,
                'id'
            ),
            $setup->getTable(static::COMMENT_BLOG_TABLE),
            'article_id',
            $setup->getTable(static::ARTICLE_BLOG_TABLE),
            'id',
            Table::ACTION_CASCADE
        );
        $setup->getConnection()->addForeignKey(
            $setup->getFkName(
                static::COMMENT_BLOG_TABLE,
                'entity_id',
                static::CUSTOMER_ENTITY_TABLE,
                'entity_id'
            ),
            $setup->getTable(static::COMMENT_BLOG_TABLE),
            'entity_id',
            $setup->getTable(static::CUSTOMER_ENTITY_TABLE),
            'entity_id',
            Table::ACTION_CASCADE
        );
    }
}
