<?php

namespace Omnipro\Blog\Block\Adminhtml\Widget\Grid\Category;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Grid\Column;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\Text;
use Magento\Directory\Helper\Data as DirectoryHelper;
use Magento\Framework\DataObject;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Framework\UrlInterface;

class Edit extends Column
{
    protected UrlInterface $urlBuilder;


    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        array $data = [],
        ?JsonHelper $jsonHelper = null,
        ?DirectoryHelper $directoryHelper = null
    )
    {
        parent::__construct($context, $data, $jsonHelper, $directoryHelper);
        $this->urlBuilder = $urlBuilder;
    }

    public function getRowField(DataObject $row)
    {
        $categoryId = $this->getRenderer()->render($row);

        $editUrl = $this->urlBuilder->getUrl('omnipro_blog/category/edit', ['id' => $categoryId]);

        return sprintf(
            '<a href="%s" title="%s">%s</a>',
            $editUrl,
            __('Edit'),
            __('Edit')
        );
    }
}
