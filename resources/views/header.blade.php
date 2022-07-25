<div id="header">
  <div class="header-top">
    <div class="container">
      <div class="pull-left auto-width-left">
        <ul class="top-menu menu-beta l-inline">
          <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
          <li><a href=""><i class="fa fa-phone"></i> 0355 621 838</a></li>
        </ul>
      </div>
      <div class="pull-right auto-width-right">
        <ul class="top-details menu-beta l-inline">
          @if(Session::has('user'))
          <li><a href="logout"><i class="fa fa-user"></i>{{Session('user')->name}}</a></li>
          @else
          <li><a href="register">Đăng kí</a></li>
          <li><a href="login">Đăng nhập</a></li>
          @endif
        </ul>
      </div>
      <div class="clearfix"></div>
    </div> <!-- .container -->
  </div> <!-- .header-top -->
  <div class="header-body">
    <div class="container beta-relative">
      <div class="pull-left">
        <a href="trangchu" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
      </div>
      <div class="pull-right beta-components space-left ov">
        <div class="space10">&nbsp;</div>
        <div class="beta-comp">
          <form role="search" method="get" id="searchform" action="/">
            <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
          </form>
        </div>
        <!-- CART -->
        <div class="beta-comp">
          @if(Session::has('cart'))
          <div class="cart">
            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng
              (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trong @endif) <i
                class="fa fa-chevron-down"></i></div>
            <div class="beta-dropdown cart-body">

              @foreach($product_cart as $product)
              <div class="cart-item" id="cart-item{{$product['item']['id']}}">
                <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"
                  value="{{$product['item']['id']}}" soluong="{{$product['qty']}}"><i class="fa fa-times"></i></a>
                <div class="media">
                  <a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}"
                      alt=""></a>
                  <div class="media-body">
                    <span class="cart-item-title">{{$product['item']['name']}}</span>
                    <span class="cart-item-amount">{{$product['qty']}}*<span id="dongia{{$product['item']['id']}}"
                        value="@if($product['item']['promotion_price']==0){{($product['item']['unit_price'])}}@else {{($product['item']['promotion_price'])}}@endif">@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}}@else
                        {{number_format($product['item']['promotion_price'])}}@endif</span></span>
                  </div>
                </div>
              </div>
              @endforeach

              <div class="cart-caption">
                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"
                    value="@if(Session::has('cart')){{($totalPrice)}}@else 0 @endif">@if(Session::has('cart')){{number_format($totalPrice)}}@else
                    0 @endif đồng</span></div>
                <div class="clearfix"></div>

                <div class="center">
                  <div class="space10">&nbsp;</div>
                  <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i
                      class="fa fa-chevron-right"></i></a>
                </div>
              </div>
            </div>
          </div> <!-- .cart -->
          @endif
        </div>

        <!-- WISHLIST -->

        <div class="beta-comp">
          @if(isset($wishlists))
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-heart"></i> Wishlist (@if(isset($wishlists)&&count($wishlists)>0){{$sumWishlist}}@else
              Trống @endif)
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <div class="dropdown-item">
                @for($i = 0; $i< count($wishlists);$i++) <div class="cart-item"
                  id="cart-item{{$productsInWishlist[$i]->id}}">
                  <a class="cart-item-delete" href="/wishlist/delete/{{$wishlists[$i]->id}}"><i
                      class="fa fa-times"></i></a>
                  <div class="media">
                    <a class="pull-left" href="#"><img src="source/image/product/{{$productsInWishlist[$i]->image}}"
                        alt="product"></a>
                    <div class="media-body">
                      <span class="cart-item-title">{{$productsInWishlist[$i]->name}}</span>
                      <span class="cart-item-amount">{{$wishlists[$i]->quantity}}*<span
                          id="dongia{{$productsInWishlist[$i]->id}}">@if($productsInWishlist[$i]->promotion_price==0){{number_format($productsInWishlist[$i]->unit_price)}}@else
                          {{number_format($productsInWishlist[$i]->promotion_price)}}@endif</span></span>
                    </div>
                  </div>
              </div>
              @endfor
            </div>

            <div class="dropdown-item">
              <div class="cart-caption">
                <div class="cart-total text-right">Tổng tiền: <span
                    class="cart-total-value">@if(isset($wishlists)){{number_format($totalWishlist)}}@else
                    0 @endif đồng</span></div>
                <div class="clearfix"></div>

                <div class="center">
                  <div class="space10">&nbsp;</div>
                  <a href="/wishlist/order" class="beta-btn primary text-center">Đặt hàng <i
                      class="fa fa-chevron-right"></i></a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div> <!-- .wishlist -->
      @endif
    </div>

    <div class="clearfix"></div>
  </div> <!-- .container -->
</div> <!-- .header-body -->
<div class="header-bottom" style="background-color: #0277b8;">
  <div class="container">
    <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i
        class="fa fa-bars"></i></a>
    <div class="visible-xs clearfix"></div>
    <nav class="main-menu">
      <ul class="l-inline ov">
        <li><a href="/trangchu">Trang chủ</a></li>
        <li><a href="/type/1"> Loại sản phẩm</a>
          <ul class="sub-menu">
            @foreach($loai_sp as $loai)
            <li><a href="/type/{{$loai->id}}">{{$loai->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="about">Giới thiệu</a></li>
        <li><a href="/contact">Liên hệ</a></li>
      </ul>
      <div class="clearfix"></div>
    </nav>
  </div> <!-- .container -->
</div> <!-- .header-bottom -->
</div> <!-- #header -->
