<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\DeleteRequest as DeletePostRequest;
use App\Services\Post\DeleteService;
use App\Validator\Post\DeleteValidator as DeletePostValidator;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Delete Blog post.
     */
    public function __invoke(DeletePostRequest $request, DeleteService $service): Response
    {
        $data = $request->only(['id']);
        $service->execute($data, [
            DeletePostValidator::class,
        ]);

        return response([
            'status_code' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }
}
