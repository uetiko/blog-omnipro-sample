<?php

namespace Omnipro\Blog\Model;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Omnipro\Blog\Api\Data\CategoryBlogInterface;
use Omnipro\Blog\Api\Data\CategoryBlogRepositoryInterface;
use Omnipro\Blog\Model\CategoryBlogFactory;
use Omnipro\Blog\Model\ResourceModel\CategoryBlog as CategoryBlogResource;
use Omnipro\Blog\Model\ResourceModel\CategoryBlog\Collection;

use Omnipro\Blog\Model\ResourceModel\CategoryBlog\CollectionFactory as CategoryBlogCollectionFactory;


class CategoryBlogRepository implements CategoryBlogRepositoryInterface
{
    protected CategoryBlogFactory $categoryBlogFactory;
    protected CategoryBlogResource $resource;
    protected CategoryBlogCollectionFactory $collectionFactory;

    public function __construct(
        CategoryBlogFactory $categoryBlogFactory,
        CategoryBlogResource $resource,
        CategoryBlogCollectionFactory $collectionFactory
    ) {
        $this->categoryBlogFactory = $categoryBlogFactory;
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param int $id
     * @return CategoryBlogInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): CategoryBlogInterface
    {
        $categoryBlog = $this->categoryBlogFactory->create();
        $this->resource->load($categoryBlog, $id);
        if (is_null($categoryBlog->getId())) {
            throw new NoSuchEntityException(__('CategoryBlog with id "%1" does not exist.', $id));
        }
        return $categoryBlog;
    }

    /**
     * @param CategoryBlogInterface $categoryBlog
     * @return CategoryBlogInterface
     * @throws CouldNotSaveException
     */
    public function save(CategoryBlogInterface $categoryBlog): CategoryBlogInterface
    {
        try {
            $this->resource->save($categoryBlog);
        } catch (\Throwable $exception) {
            throw new CouldNotSaveException(
                __(
                    'Could not save the category blog: %1',
                    $exception->getMessage()
                )
            );
        }
        return $categoryBlog;
    }

    /**
     * @param CategoryBlogInterface $categoryBlog
     * @return void
     * @throws CouldNotDeleteException
     */
    public function delete(CategoryBlogInterface $categoryBlog): void
    {
        try {
            $this->resource->delete($categoryBlog);
        } catch (\Throwable $exception) {
            throw new CouldNotDeleteException(
                __(
                    'Could not delete the category blog: %1',
                    $exception->getMessage()
                )
            );
        }
    }

    /**
     * @return Collection
     */
    public function getList(): Collection
    {
        return $this->collectionFactory->create();
    }
}
