<?php

namespace Omnipro\Blog\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Omnipro\Blog\Model\CategoryBlogRepository;

class Edit extends Action
{
    protected PageFactory $pageFactory;
    protected CategoryBlogRepository $categoryBlogRepository;

    public function __construct(
        Context $context,
        CategoryBlogRepository $categoryBlogRepository,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->categoryBlogRepository = $categoryBlogRepository;
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Omnipro_Blog::category');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Category'));
        $categoryId = $this->getRequest()->getParam('id');
        $category = $this->categoryBlogRepository->getById($categoryId);
        if (is_null($category->getId())) {
            $this->messageManager->addErrorMessage(__('This category no longer exists.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('omnipro_blog/category/index');
        }
        $resultPage->addHandle('omnipro_blog_category_edit');
        $resultPage->addPageLayoutHandles(['id' => $category->getId()]);
        $resultPage->getLayout()->getBlock(
            'omnipro_blog_category_edit_ui'
        )->setData(
            'category_data',
            [
                'id' => $category->getId(),
                'category_name' => $category->getCategoryName(),
                'category_description' => $category->getCategoryDescription(),
            ]
        );

        return $resultPage;
    }
}
