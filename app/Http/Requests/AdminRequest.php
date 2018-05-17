<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $function = last(explode('/', $this->path())).'Valid';
        if (method_exists(self::class, $function)) {
            if ( ! is_array($this->{$function})) {
                return [];
            }

            return $this->{$function};
        }

        return [];

    }

    public function testValid()
    {
        return [
            'a' => 'required',
        ];
    }

}
