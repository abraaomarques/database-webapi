<?php

namespace AbraaoMarques\Blog\Api\Data;

interface PostInterface
{
    const ENTITY_ID = 'entity_id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getCreatedAt();
}
