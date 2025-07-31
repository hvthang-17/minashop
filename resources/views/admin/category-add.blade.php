@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thông tin danh mục</h3>
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
                    <a href="{{route('admin.categories')}}">
                        <div class="text-tiny">Danh mục</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Danh mục mới</div>
                </li>
            </ul>
        </div>
        <!-- danh mục mới -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Tên danh mục <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Tên danh mục" name="name"
                        tabindex="0" value="{{old('name')}}" aria-required="true">
                </fieldset>
                @error('name') <span class="alert alert-danger fs-5"><strong>{{ $message }}</strong></span>
                @enderror
                <fieldset class="name">
                    <div class="body-title">Slug danh mục <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Slug danh mục" name="slug"
                        tabindex="0" value="{{old('slug')}}" aria-required="true">
                </fieldset>
                @error('slug') <span class="alert alert-danger fs-5"><strong>{{ $message }}</strong></span>
                @enderror
                <fieldset>
                    <div class="body-title">Tải lên hình ảnh <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="upload-1.html" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Kéo thả hình ảnh của bạn vào đây hoặc chọn <span
                                        class="tf-color">nhấp để duyệt</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('image') <span class="alert alert-danger fs-5"><strong>{{ $message }}</strong></span>
                @enderror
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function(){
        // Hiển thị ảnh khi người dùng chọn file
        $("#myFile").on("change", function(e){
            const photoInp = $("#myFile");
            const [file] = this.files;
            if(file)
            {
                $("#imgpreview img").attr('src', URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });

        // Tự động tạo slug từ tên danh mục
        $("input[name='name']").on("change",function(){
            $("input[name='slug']").val(StringToSlug($(this).val()));
        });
    });

    // Chuyển đổi tên thành slug
    function StringToSlug(Text)
    {
        return Text.toLowerCase()
        .replace(/[^\w]+g,"")
        .replace(/ +/g,"-");
    }

    </script>
@endpush
