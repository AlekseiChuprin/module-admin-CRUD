<?php


namespace Study\Post\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Study\Post\Api\Data\PostInterface;

interface PostRepositoryInterface
{
    /**
     * @param int $id
     * @return \Study\Post\Api\Data\PostInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Study\Post\Api\Data\PostInterface $post
     * @return \Study\Post\Api\Data\PostInterface
     */
    public function save(\Study\Post\Api\Data\PostInterface $post);

    /**
     * @param \Study\Post\Api\Data\PostInterface $post
     * @return void
     */
    public function delete(\Study\Post\Api\Data\PostInterface $post);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Study\Post\Api\Data\PostSearchResultInterface
     */
    public function getList(\Study\Post\Api\Data\PostInterface $post);

}
