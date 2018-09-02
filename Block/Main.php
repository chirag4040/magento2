<?php
namespace Simple\First\Block;
use Magento\Framework\View\Element\Template;

class Main extends Template
{
    protected $_firstFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Simple\First\Model\FirstFactory $firstFactory,
        array $data = []
    ) {
        $this->_firstFactory = $firstFactory;
        parent::__construct(
            $context,
            $data
        );
    }
    protected function _prepareLayout()
    {
    	$this->setMessage('Welcome');
    }
    public function getRecord(){
        $firstCollection = $this->_firstFactory->create();
        $collection = $firstCollection->getCollection();
        return $collection;
    }

}
