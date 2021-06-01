<?php


namespace Study\Post\Model;

use Magento\Framework\Validation\ValidationException;
use Study\Post\Api\Data\PostInterface;

class Post extends \Magento\Framework\Model\AbstractModel implements PostInterface
{

    const CACHE_TAG = 'study_posts';

    const ID = 'id';

    const TITLE = 'title';

    const DESCRIPTION = 'description';

    protected $_cacheTag = 'study_posts';

    protected $_eventPrefix = 'study_posts';

    protected function _construct()
    {
        $this->_init('Study\Post\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    /**
     * @throws ValidationException
     */
    protected function validate()
    {
        if (empty($this->getTitle())) {
            throw new ValidationException(__('Title is required field'));
        }
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * @param int|mixed $id
     * @return Post|void
     */
    public function setId($id)
    {
        $this->setData(self::ID);
    }

    /**
     * @return mixed|string|null
     */
    public function getTitle()
    {
        return $this->_getData(self::TITLE);
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->setData(self::TITLE);
    }

    /**
     * @return mixed|string|null
     */
    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION);
    }

}
