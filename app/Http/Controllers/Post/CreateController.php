<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreateRequest as CreatePostRequest;
use App\Services\Post\CreateService;
use App\Validator\Post\CreateValidator as CreatePostValidator;
use Illuminate\Http\Response;

class CreateController extends Controller
{
    /**
     * Create Blog post.
     */
    public function __invoke(CreatePostRequest $request, CreateService $service): Response
    {
        $data = $request->only(['title', 'content']);
        $post = $service->execute($data, [
            CreatePostValidator::class,
        ]);

        return response([
            'post' => $post,
            'status_code' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }
}
