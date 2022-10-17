<?php

namespace AbraaoMarques\Blog\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use AbraaoMarques\Blog\Api\Data\PostInterface;
use AbraaoMarques\Blog\Api\PostRepositoryInterface;
use AbraaoMarques\Blog\Model\ResourceModel\Post as PostResourceModel;
use AbraaoMarques\Blog\Model\ResourceModel\Post\CollectionFactory;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var PostResourceModel
     */
    private $postResourceModel;

    /**
     * @var PostFactory
     */
    private $postFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param PostFactory $postFactory
     * @param PostResourceModel $postResourceModel
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        PostFactory $postFactory,
        PostResourceModel $postResourceModel,
        CollectionFactory $collectionFactory
    ) {
        $this->postFactory = $postFactory;
        $this->postResourceModel = $postResourceModel;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param int $id
     * @return PostInterface
     */
    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResourceModel->load($post, $id);

        if (!$post->getEntityId())
            throw new NoSuchEntityException('The blog post with "%1" ID does not exist', $id);

        return $post;
    }

    /**
     * @param PostInterface $post
     * @return PostInterface
     */
    public function save(PostInterface $post): PostInterface
    {
        try {
            $this->postResourceModel->save($post);
        } catch (\Exception $e) {
            throw new CouldNotSaveException($e->getMessage());
        }

        return $post;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool
    {
        $post = $this->getById($id);

        try {
            $this->postResourceModel->delete($post);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException($e->getMessage());
        }

        return true;
    }

    /**
     * @return array|null
     */
    public function getList(): ?array
    {
        $collection = $this->collectionFactory->create();

        return $collection->addFieldToSelect("*")
            ->addFieldToFilter('entity_id', 3)
            ->getData();
    }
}
