@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm sản phẩm</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('admin.index')}}">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{route('admin.products')}}">
                        <div class="text-tiny">Sản phẩm</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Thêm sản phẩm</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{route('admin.product.store')}}">
            @csrf
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Tên sản phẩm <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10" type="text" placeholder="Nhập tên sản phẩm" name="name" tabindex="0" value="{{old('name')}}" aria-required="true">
                    @error('name')<sapn class="alert alert-danger">{{$message}} @enderror
                </fieldset>


                <fieldset class="name">
                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Nhập slug sản phẩm" name="slug" tabindex="0" value="{{old('slug')}}" aria-required="true">
                    @error('slug')<span class="alert alert-danger text-center">{{$message}}</span> @enderror
                </fieldset>


                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">Danh mục <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select class="" name="category_id">
                                <option>Chọn danh mục</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        @error('category_id')<span class="mt-3 alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>

                    <fieldset class="brand">
                        <div class="body-title mb-10">Thương hiệu <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select class="" name="brand_id">
                                <option>Chọn thương hiệu</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand_id')<span class="alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>

                </div>

                <fieldset class="shortdescription">
                    <div class="body-title mb-10">Mô tả ngắn <span class="tf-color-1">*</span></div>
                    <textarea class="mb-10 ht-150" name="short_description" placeholder="Mô tả ngắn" tabindex="0" aria-required="true">{{old('short_description')}}</textarea>
                    @error('short_description')<span class="alert alert-danger text-center">{{$message}}@enderror
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Mô tả chi tiết<span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="description" placeholder="Mô tả" tabindex="0" aria-required="true">{{old('description')}}</textarea>
                    @error('description')<span class="alert alert-danger text-center">{{$message}}@enderror
                </fieldset>


            </div>
            <div class="wg-box">
                <fieldset>
                    <div class="body-title">Tải lên hình ảnh <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="../../../localhost_8000/images/upload/upload-1.png" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Kéo hình ảnh vào đây hoặc chọn <span class="tf-color">click để duyệt</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                    @error('image')<span class="alert alert-danger text-center">{{$message}}@enderror
                </fieldset>

                <fieldset>
                    <div class="body-title mb-10">Tải lên ảnh thư viện</div>
                    <div class="upload-image mb-16">

                        <div id="galUpload" class="item up-load">
                            <label class="uploadfile" for="gFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">Kéo hình ảnh vào đây hoặc chọn <span
                                        class="tf-color">click để duyệt</span></span>
                                <input type="file" id="gFile" name="images[]" accept="image/*" multiple>
                            </label>
                        </div>
                    </div>
                    @error('images')<span class="alert alert-danger text-center">{{$message}}@enderror
                </fieldset>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Giá gốc <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Nhập giá gốc" name="regular_price" tabindex="0" value="{{old('regular_price')}}" aria-required="true">
                        @error('regular_price')<span class="alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>


                    <fieldset class="name">
                        <div class="body-title mb-10">Giá bán <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Nhập giá bán" name="sale_price" tabindex="0" value="{{old('sale_price')}}" aria-required="true">
                        @error('sale_price')<span class="alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>
                </div>


                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Nhập SKU" name="SKU" tabindex="0" value="{{old('SKU')}}" aria-required="true">
                        @error('SKU')<sapn class="alert alert-danger text-center">{{$message}}@enderror

                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Số lượng <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Nhập số lượng" name="quantity" tabindex="0" value="{{old('quantity')}}" aria-required="true">
                        @error('quantity')<sapn class="alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>
                </div>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Tình trạng kho</div>
                        <div class="select mb-10">
                            <select class="" name="stock_status">
                                <option value="Có hàng">Có hàng</option>
                                <option value="Hết hàng">Hết hàng</option>
                            </select>
                        </div>
                        @error('stock_status')<sapn class="alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Trạng thái</div>
                        <div class="select mb-10">
                            <select class="" name="featured">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        @error('featured')<sapn class="alert alert-danger text-center">{{$message}}@enderror
                    </fieldset>

                </div>
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Thêm</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection

@push('scripts')
<script>
    $(function(){
        $("#myFile").on("change", function(e){
            const photoImp = $("#myFile");
            const [file] = this.files;
            if (file) {
                $("#imgpreview img").attr("src", URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });

        $("#gFile").on("change", function(e){
            const photoImp = $("#gFile");
            const gphotos = this.files;
            $.each(gphotos,function(key,val){
                $("#galUpload").prepend(`<div class="item gitems"><img src="${URL.createObjectURL(val)}"/></div>`)
            })
        });

        $("input[name='name']").on("change", function(){
            $("input[name='slug']").val(StringToSlug($(this).val()));
        });
    });

    function StringToSlug(Text)
    {
        return Text.toLowerCase()
            .replace(/[^\w\-]+/g,'')
            .replace(/\s+/g,'-');
    }
</script>

@endpush

