<?php

namespace Omnipro\Blog\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class CategoryActions extends Column
{
    protected UrlInterface $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as &$item) {
                $itemId = $item['id'];
                $item[$fieldName]['edit'] = [
                    'href' => $this->urlBuilder->getUrl('omnipro_blog/category/edit', ['id' => $itemId]),
                    'label' => __('Edit')
                ];
                $item[$fieldName]['delete'] = [
                    'href' => $this->urlBuilder->getUrl('omnipro_blog/category/delete', ['id' => $itemId]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete Category'),
                        'message' => __('Are you sure you want to delete this category?')
                    ]
                ];
            }
        }

        return $dataSource;
    }
}
