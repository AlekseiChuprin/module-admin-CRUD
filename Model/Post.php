<?php


namespace Study\Post\Model;

use Magento\Framework\Validation\ValidationException;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{

    const CACHE_TAG = 'study_posts';

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

    protected function validate()
    {
        if (empty($this->getTitle())) {
            throw new ValidationException(__('Title is required field'));
        }
    }

}
