<?php

namespace Azguards\FeaturedProducts\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddIsFeaturedAttribute implements DataPatchInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Constructor Function
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Apply the data patch
     *
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Validator\ValidateException
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create();

        $eavSetup->addAttribute(
            Product::ENTITY,
            'is_featured',
            [
                'type' => 'int',
                'label' => 'Is Featured',
                'input' => 'boolean',
                'backend' => '',
                'source' => Boolean::class,
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'searchable' => true,
                'filterable' => true,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => '',
                'is_used_in_grid' => true,
                'is_filterable_in_grid' => true,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'General',
                'default' => 0
            ]
        );
    }

    /**
     * Retrieve aliases
     *
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * Retrieve dependencies
     *
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }
}
