<?php
namespace Simple\First\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class Recurring implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->query("insert into simple_first (name,imagename) values('magento2".rand(10,100)."','imagenameM2')");

        $setup->endSetup();
    }
}