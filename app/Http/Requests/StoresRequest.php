<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i|after:open_time',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên cửa hàng là bắt buộc.',
            'name.string' => 'Tên cửa hàng phải là chuỗi.',
            'name.max' => 'Tên cửa hàng không được dài hơn 255 ký tự.',

            'address.required' => 'Địa chỉ cửa hàng là bắt buộc.',
            'address.string' => 'Địa chỉ cửa hàng phải là chuỗi.',
            'address.max' => 'Địa chỉ cửa hàng không được dài hơn 255 ký tự.',

            'phone.required' => 'Số điện thoại cửa hàng là bắt buộc.',
            'phone.string' => 'Số điện thoại cửa hàng phải là chuỗi.',
            'phone.max' => 'Số điện thoại cửa hàng không được dài hơn 255 ký tự.',

            'open_time.required' => 'Giờ mở cửa là bắt buộc.',
            'open_time.date_format' => 'Giờ mở cửa phải có định dạng H:i.',

            'close_time.required' => 'Giờ đóng cửa là bắt buộc.',
            'close_time.date_format' => 'Giờ đóng cửa phải có định dạng H:i.',
            'close_time.after' => 'Giờ đóng cửa phải sau giờ mở cửa.',
        ];
    }
}
