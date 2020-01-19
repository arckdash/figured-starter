<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use App\Exceptions\Post\UpdateException as UpdatePostException;
use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required|string',
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
            'id.required' => 'An Id must be provided.',
            'title.required' => 'A Title must be provided.',
            'content.required' => 'A Content must be provided.',
        ];
    }

    /**
     * @throws UpdatePostException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new UpdatePostException($validator);
    }
}
