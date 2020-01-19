<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use App\Exceptions\Post\DeleteException as DeletePostException;
use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;

class DeleteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'id.required' => 'An Id must be provided.',
        ];
    }

    /**
     * @throws DeletePostException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new DeletePostException($validator);
    }
}
