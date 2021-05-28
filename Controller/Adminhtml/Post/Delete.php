<?php


namespace Study\Post\Controller\Adminhtml\Post;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Study\Post\Model\ResourceModel\Post
     */
    protected $resourcePost;

    /**
     * @var \Study\Post\Model\PostFactory
     */
    protected $postFactory;

    /**
     * @var MessageManagerInterface
     */
    protected $messageManager;

    /**
     * Delete constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Study\Post\Model\ResourceModel\Post $resourcePost
     * @param \Study\Post\Model\PostFactory $postFactory
     * @param MessageManagerInterface $messageManager
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Study\Post\Model\ResourceModel\Post $resourcePost,
       \Study\Post\Model\PostFactory $postFactory,
       MessageManagerInterface $messageManager
    )
    {
        parent::__construct($context);
        $this->resourcePost = $resourcePost;
        $this->postFactory = $postFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $postId = $this->getRequest()->getParam('id');
        $postEmptyModel = $this->postFactory->create();
        $this->resourcePost->load($postEmptyModel, $postId);
        $this->resourcePost->delete($postEmptyModel);
        $this->messageManager->addSuccessMessage(__('Post has been successfully deleted.'));

        return $this->_redirect('studypost/post/index');
    }
}
