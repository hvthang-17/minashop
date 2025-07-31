@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Slides</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Bang điều khiển</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.slides') }}">
                            <div class="text-tiny">Slides</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Thêm Slide mới</div>
                    </li>
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{route('admin.slide.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title">Tagline <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Nhập slogan" name="tagline" tabindex="0" value="{{old('tagline')}}" aria-required="true">
                    </fieldset>
                    @error('tagline') <span class="alert alert-danger fs-5">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Tiêu đề <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Nhập tiêu đề" name="title" tabindex="0" value="{{old('title')}}" aria-required="true">
                    </fieldset>
                    @error('title') <span class="alert alert-danger fs-5">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Phụ đề <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Nhập phụ đề" name="subtitle" tabindex="0" value="{{old('subtitle')}}" aria-required="true">
                    </fieldset>
                    @error('subtitle') <span class="alert alert-danger fs-5">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title">Liên kết <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Nhập liên kết" name="link" tabindex="0" value="{{old('link')}}" aria-required="true">
                    </fieldset>
                    @error('link') <span class="alert alert-danger fs-5">{{ $message }}</span>
                    @enderror

                    <fieldset>
                        <div class="body-title">Tải lên hình ảnh <span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style="display:none;">
                                <img src="sample.jpg" class="effect8" alt="">
                            </div>
                            <div class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Kéo và thả hình ảnh vào đây hoặc chọn <span class="tf-color">click để duyệt</span></span>
                                    <input type="file" id="myFile" name="image">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('image') <span class="alert alert-danger fs-5">{{ $message }}</span>
                    @enderror

                    <fieldset class="category">
                        <div class="body-title">Trạng thái</div>
                        <div class="select flex-grow">
                            <select class="" name="status">
                                <option>Chọn</option>
                                <option value="1" @if(old('status') == "1") selected @endif>Hoạt động</option>
                                <option value="0" @if(old('status') == "0") selected @endif>Không hoạt động</option>
                            </select>
                        </div>
                    </fieldset>
                    @error('status') <span class="alert alert-danger fs-5">{{ $message }}</span>
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
        $(document).ready(function() {
        $("#myFile").on("change", function() {
            const file = this.files[0];
            if (file) {
                $("#imgpreview img").attr("src", URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });
    });
    </script>
@endpush
