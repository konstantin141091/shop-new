<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cart' => ['required', 'max:1000'],
            'name' => ['required', 'string', 'max:255'],
//            TODO добавить валидацию для телефона
            'phone' => ['required', 'max:12'],
            'location' => ['required', 'max:1000'],
            'address' => ['required', 'max:1000'],
            'delivery_method' => ['required', 'max:10'],
            'comment' => ['max:1000'],
            'email' => ['max:100'],
        ];
    }
}
