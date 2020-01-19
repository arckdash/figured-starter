<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

abstract class BaseException extends ValidationException
{
    /**
     * @var int
     */
    public $status = 500;
    /**
     * @var string
     */
    protected $message = 'Internal error exception';

    /**
     * Render an exception into an HTTP response.
     */
    public function render(): JsonResponse
    {
        $errors = [];
        if ($this->validator instanceof Validator) {
            $errors = $this->validator->getMessageBag();
        }

        return response()->json([
            'message' => $this->message,
            'errors' => $errors,
            'success' => false,
            'status_code' => $this->status,
        ], $this->status);
    }
}
