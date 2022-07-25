<body>
  <div>
    <h2>{{ $data['type'] }}</h2>
    <p>Chào khách hàng thân mến</p>
    <p><b>{{ $data['thanks'] }}</b></p>
    <div>
      <div class="your-order-head">
        <h3>Đơn hàng của bạn</h3>
      </div>
      <div class="your-order-body">
        <div class="your-order-item">
          <div>
            @if(isset($data['cart']))
            @foreach($data['cart']->items as $product)
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
            <p class="your-order-f18">Tổng:
            <h5 class="color-black">@if(isset($data['cart'])){{number_format($data['cart']->totalPrice)}}@else 0 @endif
              đồng</h5>
            </p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>

    <p>{{ $data['content'] }}</p>
  </div>
</body>
