<?php


namespace Study\Post\Model;

use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;
use Study\Post\Api\PostRepositoryInterface;
use Study\Post\Api\Data\PostInterface;
use Study\Post\Api\Data\PostSearchResultInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @var \Study\Post\Model\PostFactory
     */
    protected $postFactory;

    /**
     * @var \Study\Post\Model\ResourceModel\Post
     */
    protected $resourcePost;

    /**
     * @var ResourceModel\Post
     */
    protected $postCollection;

    /**
     * Save constructor.
     * @param \Study\Post\Model\PostFactory $postFactory
     * @param \Study\Post\Model\ResourceModel\Post $resourcePost
     */
    public function __construct
    (
        \Study\Post\Model\PostFactory $postFactory,
        \Study\Post\Model\ResourceModel\Post $resourcePost,
        \Study\Post\Model\ResourceModel\Post $postCollection
    )
    {
        $this->postFactory = $postFactory;
        $this->resourcePost = $resourcePost;
        $this->postCollection = $postCollection;
    }

    /**
     * @param int $id
     * @return PostInterface
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $post = $this->postFactory->create();
        $this->resourcePost->load($post, $id);
        if (!$post->getId()) {
            throw new NoSuchEntityException(__('Unable to find hamburger with ID "%1"', $id));
        }
        return $post;
    }

    /**
     * @param PostInterface $post
     * @return PostInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(PostInterface $post)
    {
        $this->resourcePost->save($post);
        return $post;
    }

    /**
     * @param PostInterface $post
     * @throws \Exception
     */
    public function delete(PostInterface $post)
    {
        $this->resourcePost->delete($post);
    }

    /**
     * @param PostInterface $post
     * @return PostSearchResultInterface|ResourceModel\Post
     */
    public function getList(PostInterface $post)
    {
        return $this->postCollection;
    }


}
