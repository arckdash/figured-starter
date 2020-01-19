<?php

declare(strict_types=1);

namespace App\Exceptions\Post;

use App\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateException extends BaseException
{
    /**
     * @var int
     */
    public $status = JsonResponse::HTTP_BAD_REQUEST;
    /**
     * @var string
     */
    protected $message = 'There was an error while trying to create a new Blog Post.';
}
