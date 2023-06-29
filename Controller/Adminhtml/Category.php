<?php

namespace Omnipro\Blog\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Omnipro\Blog\Model\CategoryBlogFactory;
use Omnipro\Blog\Model\CategoryBlogRepository;

class Category extends Action
{
    const ADMIN_RESOURCE = 'Omnipro_Blog::category';

    protected PageFactory $pageFactory;
    protected CategoryBlogRepository $categoryBlogRepository;
    protected DataPersistorInterface $dataPersistor;
    protected Registry $registry;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        DataPersistorInterface $dataPersistor,
        Registry $registry,
        CategoryBlogRepository $categoryBlogRepository
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->categoryBlogRepository = $categoryBlogRepository;
        $this->dataPersistor = $dataPersistor;
        $this->registry = $registry;
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Omnipro_Blog::category');
        $resultPage->getConfig()->getTitle()->prepend(__('Categories'));

        return $resultPage;
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int)$this->getRequest()->getParam('id');
        try {
            $model = $this->categoryBlogRepository->getById($id);
        } catch (NoSuchEntityException $exception) {
            $this->messageManager->addErrorMessage(__('This category no longer exists.'));
            return $this->_redirect('*/*/');
        }
        if ($this->dataPersistor->get('omnipro_blog_category')) {
            $data = $this->dataPersistor->get('omnipro_blog_category');
            $model->setData($data);
        }

        $this->registry->register('omnipro_blog_category', $model);

        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Category'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getCategoryName() : __('New Category'));

        return $resultPage;
    }
}
