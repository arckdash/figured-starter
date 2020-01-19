<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest as UpdatePostRequest;
use App\Services\Post\UpdateService;
use App\Validator\Post\UpdateValidator as UpdatePostValidator;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Update Blog post.
     */
    public function __invoke(UpdatePostRequest $request, UpdateService $service): Response
    {
        $data = $request->only(['id', 'title', 'content']);
        $post = $service->execute($data, [
            UpdatePostValidator::class,
        ]);

        return response([
            'post' => $post,
            'status_code' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }
}
