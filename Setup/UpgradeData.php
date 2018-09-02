<?php

namespace Simple\First\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;


class UpgradeData implements UpgradeDataInterface {
    private $eavSetupFactory;
    protected $_firstFactory;

    public function __construct(EavSetupFactory $eavSetupFactory,\Simple\First\Model\FirstFactory $firstFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->_firstFactory = $firstFactory;
    }


    public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {

        if ( version_compare( $context->getVersion(), '0.0.2', '<' ) ) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'custom_attribute',
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Custom Label',
                    'input' => 'boolean',
                    'class' => '',
                    'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '1',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );
        }
        if (version_compare($context->getVersion(), '0.0.3', '<')) {
            $data = [
                'name'         => "Magento2",
                'imagename' => "magento_imagename"
            ];
            $post = $this->_firstFactory->create();
            $post->addData($data)->save();
        }
    }
}