<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Signup extends FormRequest
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
            'name'=>'required|max:225|string',
            'age'=>'numeric|min:10|max:100',
            'date'=>'date',
            'phone'=>'numeric',
            'web'=>'string',
            'address'=>'string'
        ];
    }
    public function messages()
    {
        return [
            'name.string'=>'Vui long dien ten',
            'age.numeric'=>'Vui long dien tuoi phu hop',
            'age.min'=>'Tuoi phai lon hon 10',
            'age.max'=>'Tuoi phai nho hon 100',
            'date.date'=>'Vui long dien ngay thang',
            'phone.numeric'=>'Vui long kiem tra so dien thoai',
            'web.string'=>'Vui long kiem tra lai ten web',
            'address.string'=>'Vui long dien lai dia chi'
        ];
    } 
}
