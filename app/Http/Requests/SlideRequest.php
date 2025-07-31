<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'tagline' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'tagline.required' => 'Tagline là bắt buộc!',
            'title.required' => 'Tiêu đề là bắt buộc!',
            'subtitle.required' => 'Phụ đề là bắt buộc!',
            'link.required' => 'Liên kết là bắt buộc!',
            'status.required' => 'Trạng thái là bắt buộc!',
            'image.required' => 'Ảnh là bắt buộc!',
            'image.mimes' => 'Ảnh phải có định dạng PNG, JPG hoặc JPEG!',
            'image.max' => 'Ảnh phải có kích thước tối đa là 2MB!',
        ];
    }
}
