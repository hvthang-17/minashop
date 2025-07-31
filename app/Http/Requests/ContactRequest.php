<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'comment' => 'required|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc!',
            'name.max' => 'Tên không được dài quá 100 ký tự!',
            'email.required' => 'Email là bắt buộc!',
            'email.email' => 'Email không hợp lệ!',
            'phone.required' => 'Số điện thoại là bắt buộc!',
            'phone.numeric' => 'Số điện thoại phải là số!',
            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số!',
            'comment.required' => 'Bình luận là bắt buộc!',
            'comment.max' => 'Bình luận không được dài quá 1000 ký tự!',
        ];
    }
}
