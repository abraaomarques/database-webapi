<?php

namespace AbraaoMarques\Blog\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use AbraaoMarques\Blog\Api\Data\PostInterfaceFactory;
use AbraaoMarques\Blog\Api\PostRepositoryInterface;

class Content implements DataPatchInterface
{
    /**
     * @var PostInterface
     */
    private $postFactory;

    /**
     * @var PostRepositoryInterface
     */
    private $postRespository;

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @param PostInterfaceFactory $postFactory
     * @param PostRepositoryInterface $postRepository
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        PostInterfaceFactory $postFactory,
        PostRepositoryInterface $postRepository,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->postFactory = $postFactory;
        $this->postRespository = $postRepository;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @return $this
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $posts = [
            [
                'title' => 'MY FIRST TITLE NEW',
                'description' => 'MY FIRST DESCRIPTION  NEW'
            ],
            [
                'title' => 'MY SECOND TITLE NEW',
                'description' => 'MY SECOND DESCRIPTION NEW'
            ],
            [
                'title' => 'MY THIRD TITLE NEW',
                'description' => 'MY THIRD DESCRIPTION NEW'
            ],
        ];

        foreach ($posts as $item) {
            $post = $this->postFactory->create();
            $post->setData($item);
            $this->postRespository->save($post);
        }

        $this->moduleDataSetup->endSetup();
    }
}
