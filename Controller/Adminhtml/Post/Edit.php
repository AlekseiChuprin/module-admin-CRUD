<?php


namespace Study\Post\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Study\Post\Model;

class Edit extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Edit constructor.
     * @param Context $context
     * @param Model\ResourceModel\Post $resourcePost
     * @param Model\PostFactory $postFactory
     * @param MessageManagerInterface $messageManager
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Study\Post\Model\ResourceModel\Post $resourcePost,
        \Study\Post\Model\PostFactory $postFactory,
        MessageManagerInterface $messageManager,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resourcePost = $resourcePost;
        $this->postFactory = $postFactory;
        $this->messageManager = $messageManager;
        $this->resultPageFactory = $resultPageFactory;
    }


    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}
