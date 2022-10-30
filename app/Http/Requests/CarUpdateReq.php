<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateReq extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'model' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'numeric', 'min:1380', 'max:1401'],
            'color' => ['nullable', 'in:white,black,blue,red'],
        ];
    }
}
