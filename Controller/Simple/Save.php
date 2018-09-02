<?php
namespace Simple\First\Controller\Simple;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    protected $_firstFactory;
    protected $_messageManager;
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Simple\First\Model\FirstFactory $firstFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->_firstFactory = $firstFactory;
        $this->_messageManager = $context->getMessageManager();
        //$this->_messageManager = $messageManager;

        return parent::__construct($context);
    }

    public function execute()
    {
        $params = $this->getRequest()->getParams();
        unset($params['submit']);

        $firstCollection = $this->_firstFactory->create();
        $firstCollection->setData($params);
        $firstCollection->save();
        $this->_messageManager->addSuccess('Subbmitted successfully.');
        $this->_redirect('*/*/first');
        return;
    }
}