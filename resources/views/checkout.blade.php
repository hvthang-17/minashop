@extends('layouts.app')
@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Vận chuyển và thanh toán</h2>
      <div class="checkout-steps">
        <a href="{{route('cart.index')}}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Giỏ Hàng</span>
            <em>Quản lý danh sách sản phẩm của bạn</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Vận chuyển và thanh toán</span>
            <em>Thanh toán danh sách sản phẩm của bạn</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Xác nhận</span>
            <em>Kiểm tra và gửi đơn hàng của bạn</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" action="{{route('cart.place.an.order')}}" method="POST">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>THÔNG TIN VẬN CHUYỂN</h4>
              </div>
              <div class="col-6">
              </div>
            </div>

            @if($address)
                <div class="row">
                    <div class="col-md-12">
                        <div class="my-account__address-list">
                            <div class="my-account__address-list-item">
                                <div class="my-account__address-item__detail">
                                    <p>Họ và tên: {{$address->name}}</p>
                                    <p>Số điện thoại: {{$address->phone}}</p>
                                    <p>Số nhà, tên đường: {{$address->address}}</p>
                                    <p>Mã bưu điện: {{$address->zip}}</p>
                                    <p>Phường / Xã: {{$address->locality}}</p>
                                    <p>Quận / Huyện: {{$address->state}}</p>
                                    <p>Tỉnh / Thành phố: {{$address->city}}, {{$address->country}}</p>
                                    <p>Điểm nhận biết: {{$address->landmark}}</p>
                                    <br/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="{{old('name')}}">
                  <label for="name">Họ và tên *</label>
                  @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="{{old('phone')}}">
                  <label for="phone">Số điện thoại *</label>
                  @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="address" required="" value="{{old('address')}}">
                  <label for="address">Số nhà, tên đường *</label>
                  @error('address') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="locality" required="" value="{{old('locality')}}">
                  <label for="locality">Phường / Xã *</label>
                  @error('locality') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="zip" required="" value="{{old('zip')}}">
                  <label for="zip">Mã bưu điện *</label>
                  @error('zip') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="state" required="" value="{{old('state')}}">
                  <label for="state">Quận / Huyện *</label>
                  @error('state') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="city" required="" value="{{old('city')}}">
                  <label for="city">Tỉnh / Thành phố *</label>
                  @error('city') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="landmark" required="" value="{{old('landmark')}}">
                  <label for="landmark">Điểm nhận biết *</label>
                  @error('landmark') <span class="text-danger">{{$message}}</span> @enderror
                </div>
              </div>
            </div>
            @endif
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Đơn Hàng Của Bạn</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>SẢN PHẨM</th>
                      <th align="right">TẠM TÍNH</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Cart::instance('cart') as $item)
                    <tr>
                      <td>
                        {{$item->name}} x {{$item->qty}}
                      </td>
                      <td align="right">
                        ${{$item->subtotal()}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                @if(Session::has('discounts'))
                <table class="checkout-totals">
                    <tbody>
                        <tr>
                          <th>Tạm tính</th>
                          <td class="text-right">${{Cart::instance('cart')->subtotal()}}</td>
                        </tr>
                        <tr>
                          <th>Giảm giá {{Session::get('coupon')['code']}}</th>
                          <td class="text-right">${{Session::get('discounts')['discount']}}</td>
                        </tr>
                        <tr>
                          <th>Tạm tính sau khi giảm giá</th>
                          <td class="text-right">${{Session::get('discounts')['subtotal']}}</td>
                        </tr>
                        <tr>
                          <th>Vận chuyển</th>
                          <td class="text-right">Miễn phí</td>
                        </tr>
                        <tr>
                          <th>VAT</th>
                          <td class="text-right">${{Session::get('discounts')['tax']}}</td>
                        </tr>
                        <tr>
                          <th>Tổng cộng</th>
                          <td class="text-right">${{Session::get('discounts')['total']}}</td>
                        </tr>
                      </tbody>
                  </table>
                @else
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>TẠM TÍNH</th>
                      <td class="text-right">${{Cart::instance('cart')->subtotal()}}</td>
                    </tr>
                    <tr>
                      <th>VẬN CHUYỂN</th>
                      <td class="text-right">Miễn phí vận chuyển</td>
                    </tr>
                    <tr>
                      <th>VAT</th>
                      <td class="text-right">${{Cart::instance('cart')->tax()}}</td>
                    </tr>
                    <tr>
                      <th>TỔNG CỘNG</th>
                      <td class="text-right">${{Cart::instance('cart')->total()}}</td>
                    </tr>
                  </tbody>
                </table>
                @endif
              </div>
              <div class="checkout__payment-methods">
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode1" value="cart">
                  <label class="form-check-label" for="mode1">
                    Thẻ ghi nợ hoặc Thẻ tín dụng
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode2" value="paypal">
                  <label class="form-check-label" for="mode2">
                    Paypal
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode3" value="cod">
                  <label class="form-check-label" for="mode3">
                    Thanh toán khi nhận hàng
                  </label>
                </div>

                <div class="policy-text">
                    Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng của bạn, hỗ trợ trải nghiệm của bạn trên trang web này,
                    và cho các mục đích khác được mô tả trong <a href="terms.html" target="_blank">chính sách bảo mật</a> của chúng tôi.
                </div>

              </div>
              <button class="btn btn-primary btn-checkout">ĐẶT HÀNG</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>

@endsection
