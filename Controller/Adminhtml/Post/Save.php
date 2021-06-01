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
     * @var \Study\Post\Model\PostRepository
     */
    protected $postRepository;

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
        \Study\Post\Model\ResourceModel\Post $resourcePost,
        \Study\Post\Model\PostRepository $postRepository

    )
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
        $this->postFactory = $postFactory;
        $this->resourcePost = $resourcePost;
        $this->postRepository = $postRepository;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */

    /**
    public function execute()
    {
        $redirect = $this->resultFactory->create('redirect');
        $data = $this->getRequest()->getParams();
        if(empty($data['id'])) {
            unset($data['id']);
        }
        try {
            $post = $this->postFactory->create();
            $successMsg = __('Post saved successfully.');
            if($postId = $this->getRequest()->getParam('id')){
                $this->resourcePost->load($post, $postId);
                $successMsg = __('Post updated successfully.');
            }
            $post->addData($data);
            $this->resourcePost->save($post);
            $this->messageManager->addSuccessMessage($successMsg);

        } catch (ValidationException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while data save'));
        }

        return $redirect->setPath('studypost/post/index');

    }
    **/

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $redirect = $this->resultFactory->create('redirect');
        $data = $this->getRequest()->getParams();
        if(empty($data['id'])) {
            unset($data['id']);
        }
        try {
            $post = $this->postFactory->create();
            $successMsg = __('Post saved successfully.');
            if($postId = $this->getRequest()->getParam('id')){
                $post = $this->postRepository->getById($postId);
                $successMsg = __('Post updated successfully.');
            }
            $post->addData($data);
            $this->postRepository->save($post);
            $this->messageManager->addSuccessMessage($successMsg);
        } catch (ValidationException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while data save'));
        }

        return $redirect->setPath('studypost/post/index');
    }

}
