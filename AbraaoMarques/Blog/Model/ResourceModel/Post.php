<?php

namespace AbraaoMarques\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    const MAIN_TABLE = 'abraaomarques_blog';
    const ID_FIELD_NAME = 'entity_id';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
