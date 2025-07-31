<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:categories,slug,' . $this->id . '|string|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc!',
            'name.string' => 'Tên danh mục phải là chuỗi!',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự!',
            'slug.required' => 'Slug là bắt buộc!',
            'slug.unique' => 'Slug đã tồn tại, vui lòng chọn slug khác!',
            'slug.max' => 'Slug không được vượt quá 255 ký tự!',
            'image.mimes' => 'Ảnh phải có định dạng png, jpg hoặc jpeg!',
            'image.max' => 'Kích thước ảnh tối đa là 2MB!',
        ];
    }
}
