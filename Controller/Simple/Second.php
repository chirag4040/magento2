<?php
namespace Simple\First\Controller\Simple;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Second extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    protected $_firstFactory;
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Simple\First\Model\FirstFactory $firstFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->_firstFactory = $firstFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $firstCollection = $this->_firstFactory->create();
        $collection = $firstCollection->getCollection();
        echo "<pre/>";print_r($collection->getData());exit;
        die('Second Controller');
        //var_dump(__METHOD__);
        $page_object = $this->pageFactory->create();;
        return $page_object;
    }
}