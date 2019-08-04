<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required | email',
            'website' => 'required',
            'message' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Yêu cầu nhập',
            'email.required' => 'Yêu cầu nhập',
            'email.email' => 'Yêu cầu nhập đúng định dạng',
            'website.required' => 'Yêu cầu nhập',
            'message.required' => 'Yêu cầu nhập',
        ];
    }
}
