<?php

namespace Omnipro\Blog\Block\Adminhtml\Category\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{
    protected const SORT_ORDER = 20;

    /**
     * @return array
     */
    public function getButtonData()
    {

        return [
            'label' => __('Save Category'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => static::SORT_ORDER,
        ];
    }
}
