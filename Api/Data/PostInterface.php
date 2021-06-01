<?php


namespace Study\Post\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;


interface PostInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description);

}
