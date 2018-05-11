<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Contracts\Validation\Validator;

class Request extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new StoreResourceFailedException('数据验证失败', $validator->errors());
    }
}
