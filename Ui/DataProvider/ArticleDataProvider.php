<?php

namespace Omnipro\Blog\Ui\DataProvider;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Omnipro\Blog\Model\ResourceModel\ArticleBlog\Collection;

class ArticleDataProvider extends AbstractDataProvider
{
    protected SearchResultInterface $searchResult;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $articleCollection,
        SearchResultInterface $searchResult,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $articleCollection;
        $this->searchResult = $searchResult;
    }

    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }

        return $this->searchResult->getItems();
    }
}
