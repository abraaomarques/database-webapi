<?php

namespace AbraaoMarques\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use AbraaoMarques\Blog\Model\Post;
use AbraaoMarques\Blog\Model\ResourceModel\Post as PostResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class, PostResourceModel::class);
    }
}
