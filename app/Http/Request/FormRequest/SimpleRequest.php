<?php

declare(strict_types=1);

namespace App\Http\Request\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Urameshibr\Requests\FormRequest;

/**
 * @method mixed input($key = null, $default = null)
 */
class SimpleRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator);
    }
}
