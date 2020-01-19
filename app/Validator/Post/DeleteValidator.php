<?php

declare(strict_types=1);

namespace App\Validator\Post;

use App\Exceptions\Post\DeleteException;
use App\Repositories\PostRepository;
use Illuminate\Support\MessageBag;

class DeleteValidator
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
     * @throws DeleteException
     */
    public function execute(array $data, callable $next)
    {
        $post = $this->postRepository->findBy('_id', $data['id']);

        if ($post === null) {
            throw new DeleteException(new MessageBag(['Post does not exist.']));
        }

        return $next($data);
    }
}
