<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|unique:coupons,code,' .  ($this->route('id') ?? $this->id) ,
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date|after:today',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Mã giảm giá là bắt buộc!',
            'code.unique' => 'Mã giảm giá này đã tồn tại, vui lòng chọn mã khác!',
            'type.required' => 'Loại mã giảm giá là bắt buộc!',
            'value.required' => 'Giá trị giảm giá là bắt buộc!',
            'value.numeric' => 'Giá trị giảm giá phải là một số!',
            'cart_value.required' => 'Giá trị giỏ hàng tối thiểu là bắt buộc!',
            'cart_value.numeric' => 'Giá trị giỏ hàng tối thiểu phải là một số!',
            'expiry_date.required' => 'Ngày hết hạn là bắt buộc!',
            'expiry_date.date' => 'Ngày hết hạn phải có định dạng ngày hợp lệ!',
            'expiry_date.after' => 'Ngày hết hạn phải sau ngày hôm nay!',
        ];
    }
}
