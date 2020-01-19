<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Post;

class PostRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected $modelClassName = Post::class;
}
