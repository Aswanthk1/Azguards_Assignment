<?php

namespace Azguards\FeaturedProducts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Store\Model\ScopeInterface;

class FeaturedProducts extends Template
{
    /**
     * @var CollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * @var ImageHelper
     */
    protected $imageHelper;

    /**
     * Constructor Function
     *
     * @param Template\Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param ImageHelper $imageHelper
     * @param array $data
     */
    public function __construct(
        Template\Context  $context,
        CollectionFactory $productCollectionFactory,
        ImageHelper       $imageHelper,
        array             $data = []
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    /**
     * Get Featured Products
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getFeaturedProducts()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect(['name', 'price', 'thumbnail'])
            ->addAttributeToFilter('is_featured', 1)
            ->setPageSize((int)
            $this->_scopeConfig->getValue('catalog/featured_products/max_products', ScopeInterface::SCOPE_STORE))
            ->setCurPage(1);

        return $collection;
    }

    /**
     * Get Product Image URL
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return string
     */
    public function getImageUrl($product)
    {
        return $this->imageHelper->init($product, 'product_thumbnail_image')->getUrl();
    }
}
