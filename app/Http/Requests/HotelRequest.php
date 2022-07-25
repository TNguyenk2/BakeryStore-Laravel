<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'roomName' => 'required|max:300|string',
            'roomDescription' => 'required|string',
            'roomPrice' => 'required|numeric|min:10000',
            'roomImage' => 'required|filled|image|mimes:jpeg,png,jpg,gif,svg|max:25000',
        ];
    }

    public function messages()
    {
        return [
            'roomName.required' => 'Bạn chưa nhập tên phòng',
            'roomName.max' => 'Tên phòng chỉ có tối đa 300 ký tự',
            'roomDescription.required' => 'Bạn chưa nhập mô tả phòng',
            'roomPrice.required' => 'Bạn chưa nhập giá phòng',
            'roomPrice.min' => 'Giá thuê phòng phải lớn hơn 100000 đ',
            'roomImage.required' => 'Bạn chưa chọn ảnh',
            'roomImage.filled' => 'Bạn chưa chọn ảnh',
            'roomImage.max' => 'Kích thước ảnh tối đa là 25Mb',
            'roomImage.image' => 'File bạn upload không phải ảnh'
        ];
    }
}
