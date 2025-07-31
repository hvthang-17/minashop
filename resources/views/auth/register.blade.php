@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
            href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="true">Đăng ký</a>
        </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
        <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
          <div class="register-form">
            <form method="POST" action="{{ route('register') }}" name="register-form" class="needs-validation" novalidate="">
                @csrf
              <div class="form-floating mb-3">
                <input class="form-control form-control_gray @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus="">
                <label for="name">Họ và tên *</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="pb-3"></div>
              <div class="form-floating mb-3">
                <input id="email" class="form-control form-control_gray @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                <label for="email">Địa chỉ Email *</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="mobile" type="text" class="form-control form-control_gray @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile">
                <label for="mobile">Số điện thoại *</label>
                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="pb-3"></div>

              <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control form-control_gray @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                <label for="password">Mật khẩu *</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input id="password-confirm" type="password" class="form-control form-control_gray"
                  name="password_confirmation" autocomplete="new-password">
                <label for="password">Xác nhận mật khẩu *</label>
              </div>

              <div class="d-flex align-items-center mb-3 pb-2">
                <p class="m-0">Thông tin cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên trang web này, quản lý quyền truy cập tài khoản, và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi.</p>
              </div>

              <button class="btn btn-primary w-100 text-uppercase" type="submit">Đăng ký</button>

              <div class="customer-option mt-4 text-center">
                <span class="text-secondary">Đã có tài khoản?</span>
                <a href="{{ route('login')}}" class="btn-text js-show-register">Đăng nhập</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
