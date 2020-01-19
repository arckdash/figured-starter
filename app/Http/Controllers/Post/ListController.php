<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\ListService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    /**
     * List Blog post.
     */
    public function __invoke(Request $request, ListService $service): Response
    {
        $posts = $service->execute([], []);

        return response([
            'posts' => $posts,
            'status_code' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }
}
