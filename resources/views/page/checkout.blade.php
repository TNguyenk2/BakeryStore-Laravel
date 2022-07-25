@extends('master')
@section('content')
<div class="container">
  <div id="content">
    <form method="post" class="beta-form-checkout">
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <h4>Billing Address</h4>
          <div class="space20">&nbsp;</div>

          <div class="form-block">
            <label for="full_name">Họ tên*</label>
            <input type="text" name="full_name" id="full_name" required>
          </div>

          <div class="form-block">
            <label for="gender">Giới tính</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Nam" checked>
                Nam
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Nữ">
                Nữ
              </label>
            </div>
          </div>

          <div class="form-block">
            <label for="email">Email*</label>
            <input type="email" name="email" id="email" required>
          </div>

          <div class="form-block">
            <label for="address">Địa chỉ*</label>
            <input type="text" name="address" id="address" required>
          </div>

          <div class="form-block">
            <label for="phone">Điện thoại*</label>
            <input type="text" name="phone" id="phone" required>
          </div>

          <div class="form-block">
            <label for="notes">Ghi chú</label>
            <textarea name="notes" id="notes"></textarea>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="your-order">
            <div class="your-order-head">
              <h5>Đơn hàng của bạn</h5>
            </div>
            <div class="your-order-body">
              <div class="your-order-item">
                <div>
                  @if(Session::has('cart'))
                  @foreach($product_cart as $product)
                  <div class="media">
                    <img width="35%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                    <div class="media-body">
                      <p class="font-large">{{$product['item']['name']}}</p>
                      <span class="color-gray your-order-info">Số lượng: {{$product['qty']}}</span>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <!-- end one item -->
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="your-order-item">
                <div class="pull-left">
                  <p class="your-order-f18">Tổng:</p>
                </div>
                <div class="pull-right">
                  <h5 class="color-black">@if(Session::has('cart'))<input type ="text" name = "tongtien" value="{{$totalPrice}}"> @else 0 @endif đồng
                  </h5>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="your-order-head">
              <h5>Payment Method</h5>
            </div>

            <div class="your-order-body">
              <ul class="payment_methods methods">
                <li class="payment_method_bacs">
                  <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs"
                    checked="checked" data-order_button_text="">
                  <label for="payment_method_bacs">Direct Bank Transfer </label>
                  <div class="payment_box payment_method_bacs" style="display: block;">
                    Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                    Your order won’t be shipped until the funds have cleared in our account.
                  </div>
                </li>

                <li class="payment_method_vnpay">
                  <input id="payment_method_vnpay" type="radio" class="input-radio" name="payment_method" value="vnpay"
                    data-order_button_text="Proceed to VnPay">
                  <label for="payment_method_vnpay">VnPay</label>
                  <div class="payment_box payment_method_vnpay" style="display: none;">
                    Pay via VnPay; you can pay with your credit card if you don’t have a VnPay account
                  </div>
                </li>
              </ul>
            </div>

            <div class="text-center">
              <button type="submit" name="redirect" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button>
            </div>
          </div> <!-- .your-order -->
        </div>
      </div>
    </form>
  </div> <!-- #content -->
</div> <!-- .container -->
@endsection
