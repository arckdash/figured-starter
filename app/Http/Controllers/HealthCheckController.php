<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class HealthCheckController extends Controller
{
    /**
     * Health check.
     */
    public function __invoke()
    {
        return [
            'version' => config('api.version'),
        ];
    }
}
