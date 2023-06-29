<?php

namespace Omnipro\Blog\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Omnipro\Blog\Model\CategoryBlogRepository;
use Throwable;

class Save extends Action
{
    protected DataPersistorInterface $dataPersistor;
    protected CategoryBlogRepository $categoryBlogRepository;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        CategoryBlogRepository $categoryBlogRepository
    ) {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->categoryBlogRepository = $categoryBlogRepository;
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            return $this->_redirect('omnipro_blog/category/index');
        }

        try {
            $category = $this->categoryBlogRepository->save($data);
            $this->messageManager->addSuccessMessage(__('You saved the category'));
            $this->dataPersistor->clear('omnipro_blog_category');
            if ($this->getRequest()->getParam('back')) {
                return $this->_redirect(
                    'omnipro_blog/category/edit',
                    [
                        'id' => $category->getId(),
                        '_current' => true
                    ]
                );
            }
            return $this->_redirect('omnipro_blog/category/index');
        } catch (Throwable $exception) {
            $this->messageManager->addErrorMessage(__('Something went wrong while saving the category'));
            $this->dataPersistor->set('omnipro_blog_category', $data);
            return $this->_redirect('omnipro_blog/category/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
    }
}
