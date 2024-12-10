<?php

namespace Azguards\FeaturedProducts\Model;

use Azguards\FeaturedProducts\Api\FeaturedProductsInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class FeaturedProducts implements FeaturedProductsInterface
{
    /**
     * @var CollectionFactory
     */
    private $productCollectionFactory;

    /**
     * Constructor
     *
     * @param CollectionFactory $productCollectionFactory
     */
    public function __construct(CollectionFactory $productCollectionFactory)
    {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    /**
     * Get the list of featured products
     *
     * @return array
     */
    public function getList()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect(['name', 'price', 'thumbnail'])
            ->addAttributeToFilter('is_featured', 1)
            ->setPageSize(10);

        $products = [];
        foreach ($collection as $product) {
            $products[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'image_url' => $product->getThumbnail()
            ];
        }
        return $products;
    }
}
