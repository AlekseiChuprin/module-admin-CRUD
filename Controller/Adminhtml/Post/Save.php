<?php


namespace Study\Post\Controller\Adminhtml\Post;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;
use Magento\Framework\Validation\ValidationException;


class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    protected $resultFactory;

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
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     * @param MessageManagerInterface $messageManager
     * @param \Study\Post\Model\PostFactory $postFactory
     * @param \Study\Post\Model\ResourceModel\Post $resourcePost
     */
    public function __construct
    (
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        MessageManagerInterface $messageManager,
        \Study\Post\Model\PostFactory $postFactory,
        \Study\Post\Model\ResourceModel\Post $resourcePost

    )
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
        $this->postFactory = $postFactory;
        $this->resourcePost = $resourcePost;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute()
    {
        if($this->getRequest()->getParam('id')) {
            $postId = $this->getRequest()->getParam('id');
            try {
                $post = $this->postFactory->create();
                $this->resourcePost->load($post, $postId);
                $data = $this->getRequest()->getParams();
                $post->addData($data);
                $this->resourcePost->save($post);
                $this->messageManager->addSuccessMessage(__('Post updated successfully.'));

            } catch (ValidationException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
                $redirect->setUrl("/team/index/edit/id/$postId");

                return $redirect;
            }

            return $this->resultFactory->create('redirect')->setPath('*/*/index');
        }

        else {
            $data = $this->getRequest()->getParams();
            try {
                $post = $this->postFactory->create();
                $this->resourcePost->save($post->addData($data));
                $this->messageManager->addSuccessMessage(__('Saved successfully.'));

            } catch (ValidationException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());

            }

            return $this->resultFactory->create('redirect')->setPath('*/*/index');
        }

    }
}
