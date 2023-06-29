<?php

namespace Omnipro\Blog\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Omnipro\Blog\Api\Data\CommentBlogInterface;
use Omnipro\Blog\Api\Data\CommentBlogRepositoryInterface;
use Omnipro\Blog\Model\ResourceModel\CommentBlog as CommentBlogResource;
use Omnipro\Blog\Model\CommentBlogFactory;
use Omnipro\Blog\Model\ResourceModel\CommentBlog\Collection;
use Omnipro\Blog\Model\ResourceModel\CommentBlog\CollectionFactory as CommentBlogCollectionFactory;

class CommentBlogRepository implements CommentBlogRepositoryInterface
{


    protected CommentBlogResource $resource;
    protected \Omnipro\Blog\Model\CommentBlogFactory $commentBlogFactory;
    protected CommentBlogCollectionFactory $commentBlogCollectionFactory;

    public function __construct(
        CommentBlogResource $resource,
        CommentBlogFactory $commentBlogFactory,
        CommentBlogCollectionFactory $commentBlogCollectionFactory
    ) {
        $this->resource = $resource;
        $this->commentBlogFactory = $commentBlogFactory;
        $this->commentBlogCollectionFactory = $commentBlogCollectionFactory;
    }

    /**
     * @param int $id
     * @return CommentBlogInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): CommentBlogInterface
    {
        $commentBlog = $this->commentBlogFactory->create();
        $this->resource->load($commentBlog, $id);
        if (is_null($commentBlog->getId())) {
            throw new NoSuchEntityException(__('CommentBlog with id "%1" does not exist.', $id));
        }
        return $commentBlog;
    }

    /**
     * @param CommentBlogInterface $commentBlog
     * @return CommentBlogInterface
     */
    public function save(CommentBlogInterface $commentBlog): CommentBlogInterface
    {
        try {
            $this->resource->save($commentBlog);
        } catch (\Throwable $exception) {
            throw new CouldNotSaveException(
                __(
                    'Could not save the commentBlog: %1',
                    $exception->getMessage()
                )
            );
        }
    }

    /**
     * @param CommentBlogInterface $commentBlog
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(CommentBlogInterface $commentBlog): void
    {
        try {
            $this->resource->delete($commentBlog);
        } catch (\Throwable $exception) {
            throw new CouldNotDeleteException(
                __(
                    'Could not delete the commentBlog: %1',
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
        return $this->commentBlogCollectionFactory->create();
    }
}
