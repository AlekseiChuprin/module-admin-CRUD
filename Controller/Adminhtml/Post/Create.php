<?php


namespace Study\Post\Controller\Adminhtml\Post;

use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;

class Create extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var MessageManagerInterface
     */
    protected $messageManager;

    /**
     * @var \Study\Post\Model\PostFactory
     */
    protected $postFactory;

    /**
     * @var \Study\Post\Model\ResourceModel\Post
     */
    protected $resourcePost;

    /**
     * Create constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param MessageManagerInterface $messageManager
     * @param \Study\Post\Model\PostFactory $postFactory
     * @param \Study\Post\Model\ResourceModel\Post $resourcePost
     */
    public function __construct
    (
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        MessageManagerInterface $messageManager,
        \Study\Post\Model\PostFactory $postFactory,
        \Study\Post\Model\ResourceModel\Post $resourcePost

    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->messageManager = $messageManager;
        $this->postFactory = $postFactory;
        $this->resourcePost = $resourcePost;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Add New Post')));

        return $resultPage;
    }
}
