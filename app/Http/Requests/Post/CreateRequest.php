<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use App\Exceptions\Post\CreateException as CreatePostException;
use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'A Title must be provided.',
            'content.required' => 'A Content must be provided.',
        ];
    }

    /**
     * @throws CreatePostException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new CreatePostException($validator);
    }
}
