<?php

declare(strict_types=1);

namespace App\Validator\Post;

use App\Exceptions\Post\UpdateException;
use App\Repositories\PostRepository;
use Illuminate\Support\MessageBag;

class UpdateValidator
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
     * @return mixed
     *
     * @throws UpdateException
     */
    public function execute(array $data, callable $next)
    {
        $post = $this->postRepository->findBy('_id', $data['id']);

        if ($post === null) {
            throw new UpdateException(new MessageBag(['Post does not exist.']));
        }

        return $next($data);
    }
}
