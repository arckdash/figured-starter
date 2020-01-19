<?php

declare(strict_types=1);

namespace App\Exceptions\Post;

use App\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateException extends BaseException
{
    /**
     * @var int
     */
    public $status = JsonResponse::HTTP_BAD_REQUEST;
    /**
     * @var string
     */
    protected $message = 'There was an error while trying to update a Blog Post.';
}
