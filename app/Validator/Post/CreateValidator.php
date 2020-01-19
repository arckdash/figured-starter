<?php

declare(strict_types=1);

namespace App\Validator\Post;

use App\Exceptions\Post\CreateException;
use App\Repositories\PostRepository;
use Illuminate\Support\MessageBag;

class CreateValidator
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
     * @throws CreateException
     */
    public function execute(array $data, callable $next)
    {
        $post = $this->postRepository->findBy('title', $data['title']);

        if ($post !== null) {
            throw new CreateException(new MessageBag(['There is already a post with the title: '.$data['title']]));
        }

        return $next($data);
    }
}
