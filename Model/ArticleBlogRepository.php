<?php

namespace Omnipro\Blog\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Omnipro\Blog\Api\Data\ArticleBlogInterface;
use Omnipro\Blog\Api\Data\ArticleBlogRepositoryInterface;
use Omnipro\Blog\Model\ArticleBlogFactory;
use Omnipro\Blog\Model\ResourceModel\ArticleBlog as ArticleBlogResource;
use Omnipro\Blog\Model\ResourceModel\ArticleBlog\Collection;
use Omnipro\Blog\Model\ResourceModel\ArticleBlog\CollectionFactory as ArticleBlogCollectionFactory;

class ArticleBlogRepository implements ArticleBlogRepositoryInterface
{
    protected ArticleBlogResource $resource;
    protected ArticleBlogFactory $articleBlogFactory;
    protected ArticleBlogCollectionFactory $articleBlogCollectionFactory;

    public function __construct(
        ArticleBlogResource $resource,
        ArticleBlogFactory $articleBlogFactory,
        ArticleBlogCollectionFactory $articleBlogCollectionFactory
    ) {
        $this->resource = $resource;
        $this->articleBlogFactory = $articleBlogFactory;
        $this->articleBlogCollectionFactory = $articleBlogCollectionFactory;
    }

    /**
     * @param $id
     * @return ArticleBlogInterface
     * @throws NoSuchEntityException
     */
    public function getById($id): ArticleBlogInterface
    {
        $article = $this->articleBlogFactory->create();
        $this->resource->load($article, $id);
        if (is_null($article->getId())) {
            throw new NoSuchEntityException(__('ArticleBlog with id "%1" does not exist.', $id));
        }
        return $article;
    }

    /**
     * @param ArticleBlogInterface $article
     * @return ArticleBlogInterface
     * @throws CouldNotSaveException
     */
    public function save(ArticleBlogInterface $article): ArticleBlogInterface
    {
        try {
            $this->resource->save($article);
        } catch (\Throwable $exception) {
            throw new CouldNotSaveException(
                __(
                    'Could not save the articleBlog: %1',
                    $exception->getMessage()
                ),
                $exception
            );
        }
        return $article;
    }

    /**
     * @param ArticleBlogInterface $article
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ArticleBlogInterface $article): void
    {
        try {
            $this->resource->delete($article);
        } catch (\Throwable $exception) {
            throw new CouldNotDeleteException(
                __(
                    'Could not delete the articleBlog: %1',
                    $exception->getMessage()
                ),
                $exception
            );
        }
    }

    /**
     * @return Collection
     */
    public function getList(): Collection
    {
        return $this->articleBlogCollectionFactory->create();
    }
}
