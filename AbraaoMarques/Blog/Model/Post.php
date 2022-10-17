<?php

namespace AbraaoMarques\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use AbraaoMarques\Blog\Api\Data\PostInterface;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(\AbraaoMarques\Blog\Model\ResourceModel\Post::class);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
}
