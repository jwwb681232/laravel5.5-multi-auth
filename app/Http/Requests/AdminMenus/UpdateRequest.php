<?php

namespace App\Http\Requests\AdminMenus;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'          => 'required|between:3,200',
            'href'          => 'required|between:3,200',
            'permission_id' => 'required|required_if:permission_id,0|numeric|min:0',
            'parent_id'     => 'required|required_if:parent_id,0|numeric|min:0',
            'sort'          => 'required|numeric|min:0|max:65535',
        ];
    }
}
