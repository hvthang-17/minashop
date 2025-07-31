<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:products,slug,' . $productId . '|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric|lte:regular_price',
            'SKU' => 'required|string|max:255',
            'stock_status' => 'required|string|max:255',
            'featured' => 'required|boolean',
            'quantity' => 'required|numeric|min:0',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc!',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự!',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự!',
            'slug.required' => 'Slug sản phẩm là bắt buộc!',
            'slug.unique' => 'Slug sản phẩm này đã tồn tại. Vui lòng chọn slug khác!',
            'slug.string' => 'Slug sản phẩm phải là chuỗi ký tự!',
            'slug.max' => 'Slug sản phẩm không được vượt quá 255 ký tự!',
            'short_description.required' => 'Mô tả ngắn sản phẩm là bắt buộc!',
            'short_description.string' => 'Mô tả ngắn phải là chuỗi ký tự.',
            'short_description.max' => 'Mô tả ngắn không được vượt quá 255 ký tự!',
            'description.required' => 'Mô tả chi tiết sản phẩm là bắt buộc!',
            'description.string' => 'Mô tả chi tiết sản phẩm phải là chuỗi ký tự!',
            'regular_price.required' => 'Giá gốc sản phẩm là bắt buộc!',
            'regular_price.numeric' => 'Giá gốc sản phẩm phải là số!',
            'sale_price.required' => 'Giá bán sản phẩm là bắt buộc!',
            'sale_price.numeric' => 'Giá bán sản phẩm phải là số!',
            'sale_price.lte' => 'Giá bán sản phẩm phải nhỏ hơn hoặc bằng giá gốc!',
            'SKU.required' => 'Mã sản phẩm là bắt buộc!',
            'SKU.string' => 'Mã sản phẩm phải là chuỗi ký tự!',
            'SKU.max' => 'Mã sản phẩm không được vượt quá 255 ký tự!',
            'stock_status.required' => 'Tình trạng kho sản phẩm là bắt buộc!',
            'stock_status.string' => 'Tình trạng kho phải là chuỗi ký tự!',
            'stock_status.max' => 'Tình trạng kho không được vượt quá 255 ký tự!',
            'featured.required' => 'Trạng thái nổi bật của sản phẩm là bắt buộc!',
            'featured.boolean' => 'Trạng thái nổi bật phải là giá trị boolean!',
            'quantity.required' => 'Số lượng sản phẩm là bắt buộc!',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 0!',
            'image.mimes' => 'Ảnh sản phẩm phải có định dạng png, jpg hoặc jpeg!',
            'image.max' => 'Ảnh sản phẩm không được vượt quá 2MB!',
            'category_id.required' => 'Danh mục sản phẩm là bắt buộc!',
            'category_id.exists' => 'Danh mục sản phẩm không tồn tại!',
            'brand_id.required' => 'Thương hiệu sản phẩm là bắt buộc!',
            'brand_id.exists' => 'Thương hiệu sản phẩm không tồn tại!',
        ];
    }
}
