<?php

declare(strict_types=1);

namespace App\Services\Post;

use App\Services\BaseService;
use App\Repositories\PostRepository;

class ListService extends BaseService
{
    /**
     * @var PostRepository $postRepository
     */
    private $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Process data, to meet the business logic/rules required.
     *
     * @param array $data
     *
     * @return array
     */
    public function processData(array $data = []): array
    {
        return $this->postRepository->all()->toArray();
    }
}
