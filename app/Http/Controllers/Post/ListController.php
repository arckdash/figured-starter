<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\Post\ListService;

class ListController extends Controller
{
    /**
     * Create application agreement.
     * @param Request $request
     * @param ListService $service
     *
     * @return Response
     */
    public function __invoke(Request $request, ListService $service): Response
    {
        $posts = $service->execute([], []);

        return response([
            'posts' => $posts,
            'status_code' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
