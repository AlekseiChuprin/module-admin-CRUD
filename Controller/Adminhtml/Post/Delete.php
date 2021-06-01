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
     * @var \Study\Post\Model\PostRepository
     */
    protected $postRepository;

    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    protected $resultFactory;

    /**
     * Delete constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Study\Post\Model\ResourceModel\Post $resourcePost
     * @param \Study\Post\Model\PostFactory $postFactory
     * @param MessageManagerInterface $messageManager
     * @param \Study\Post\Model\PostRepository $postRepository
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Study\Post\Model\ResourceModel\Post $resourcePost,
       \Study\Post\Model\PostFactory $postFactory,
       MessageManagerInterface $messageManager,
        \Study\Post\Model\PostRepository $postRepository,
       \Magento\Framework\Controller\ResultFactory $resultFactory
    )
    {
        parent::__construct($context);
        $this->resourcePost = $resourcePost;
        $this->postFactory = $postFactory;
        $this->messageManager = $messageManager;
        $this->postRepository = $postRepository;
        $this->resultFactory = $resultFactory;
    }

    /**
    public function execute()
    {
        $postId = $this->getRequest()->getParam('id');
        $postEmptyModel = $this->postFactory->create();
        $this->resourcePost->load($postEmptyModel, $postId);
        $this->resourcePost->delete($postEmptyModel);
        $this->messageManager->addSuccessMessage(__('Post has been successfully deleted.'));

        return $this->_redirect('studypost/post/index');
    }
    **/

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
        public function execute()
    {
        $redirect = $this->resultFactory->create('redirect');
        $post = $this->postRepository->getById($this->getRequest()->getParam('id'));
        try{
            $this->postRepository->delete($post);
            $this->messageManager->addSuccessMessage(__('Post has been successfully deleted.'));
        } catch (\Exception $e) {
        $this->messageManager->addErrorMessage($e->getMessage());

        return $redirect->setPath('*/*/edit', ['id' => $post->getId()]);
    }
        return $redirect->setPath('studypost/post/index');
    }


}
