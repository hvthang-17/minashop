<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:brands,slug,' . ($this->route('id') ?? $this->id) . '|string|max:255',  
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên thương hiệu là bắt buộc!',
            'slug.required' => 'Slug là bắt buộc!',
            'slug.unique' => 'Slug đã tồn tại. Vui lòng chọn slug khác!',
            'image.mimes' => 'Ảnh phải có định dạng png, jpg hoặc jpeg!',
            'image.max' => 'Kích thước ảnh tối đa là 2MB!',
        ];
    }
}
