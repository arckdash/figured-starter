<?php

declare(strict_types=1);

namespace App\Services\Post;

use App\Repositories\PostRepository;
use App\Services\BaseService;

class ListService extends BaseService
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Process data, to meet the business logic/rules required.
     */
    public function processData(array $data = []): array
    {
        return $this->postRepository->all()->toArray();
    }
}
