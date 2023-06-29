<?php

namespace Omnipro\Blog\Block\Adminhtml\Category\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Framework\UrlInterface;
use Magento\Backend\Block\Widget\Context;

class BackButton implements ButtonProviderInterface
{

    protected const SORT_ORDER = 10;
    protected UrlInterface $urlBuilder;

    public function __construct(
        Context $context
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
    }

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => static::SORT_ORDER
        ];
    }

    private function getBackUrl()
    {
        return $this->urlBuilder->getUrl('omnipro_blog/category/index');
    }
}
