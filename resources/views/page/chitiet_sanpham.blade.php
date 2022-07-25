@extends('master')
@section('content')

</html>
<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">San Pham {{$sanpham->name}}</h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <a href="/trangchu">Home</a> / <span>Details</span>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<div class="container">
  <div id="content">
    <div class="row">
      <div class="col-sm-9">

        <div class="row">
          <div class="col-sm-4">
            <img src="/source/image/product/{{$sanpham->image}}" alt="">
          </div>
          <div class="col-sm-8">
            <div class="single-item-body">
              <p class="single-item-title">
              <h2>{{$sanpham->name}}</h2>
              </p>
              <p class="single-item-price" style="text-align:left;font-size: 15px;">
                <span> @if($sanpham->promotion_price==0)
                  <span class="flash-sale">{{number_format($sanpham->unit_price)}} Đồng</span>
                  @else
                  <span class="flash-del">{{number_format($sanpham->unit_price)}} Đồng </span>
                  <span class="flash-sale">{{number_format($sanpham->promotion_price)}} Đồng</span>
                  @endif</span>
              </p>
            </div>

            <div class="clearfix"></div>
            <div class="space20">&nbsp;</div>

            <div class="single-item-desc">
              <p>{{$sanpham->description}}</p>
            </div>
            <div class="space20">&nbsp;</div>

            <p>So luong:</p>
            <div class="single-item-options">

              <select class="wc-select" name="color">
                <option>So luong</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i
                  class="fa fa-shopping-cart"></i></a>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>

        <div class="space40">&nbsp;</div>
        <div class="woocommerce-tabs">
          <ul class="tabs">
            <li><a href="#tab-description">Description</a></li>
            <li><a href="#tab-comment">Comments</a></li>
          </ul>

          <div class="panel" id="tab-description">
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
              dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
              sit amet.</p>
            <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
              aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
              laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea
              voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla
              pariatur? </p>
          </div>
          <div class="panel" id="tab-comment">

            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <form method="post" action="/comment/{{$sanpham->id}}">
                      @csrf
                      <div class="form-group">
                        <textarea class="form-control" name="comment" required></textarea>
                      </div>
                      <button type="submit" class="beta-btn primary">Bình luận</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            @if(isset($comments))
            @foreach($comments as $comment)
            <p class="border-bottom">
            <p><b class="pull-left">{{$comment->username}}</b></p><br />
            <p>{{$comment->comment}}</p>
            </p>
            @endforeach
            @else
            <p>Chưa có bình luận nào cả!</p>
            @endif
          </div>

        </div>
        <div class="space50">&nbsp;</div>
        <div class="beta-products-list">
          <h4>Related Products</h4>

          <div class="row">
            @foreach($splienquan as $sp)
            <div class="col-sm-4">
              <div class="single-item">
                <div class="single-item-header">
                  <a href="detail/{{$sp->id}}"><img src="/source/image/product/{{$sp->image}}" alt=""></a>
                </div>
                @if($sp->promotion_price==!0)
                <div class="ribbon-wrapper">
                  <div class="ribbon sale">Sale</div>
                </div>
                @endif
                <div class="single-item-body">
                  <p class="single-item-title">{{$sp->name}}</p>
                  <p class="single-item-price" style="text-align:left;font-size: 15px;">
                    @if($sp->promotion_price==0)
                    <span class="flash-sale">{{number_format($sp->unit_price)}} Đồng</span>
                    @else
                    <span class="flash-sale">{{number_format($sp->promotion_price)}} Đồng</span>
                    <span class="flash-del">{{number_format($sp->unit_price)}} Đồng </span>
                    @endif
                  </p>
                </div>
                <div class="single-item-caption">
                  <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i
                      class="fa fa-shopping-cart"></i></a>
                  <a class="beta-btn primary" href="detail/{{$sp->id}}">Details <i class="fa fa-chevron-right"></i></a>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div> <!-- .beta-products-list -->
      </div>
      <div class="col-sm-3 aside">
        <div class="widget">
          <h3 class="widget-title">Best Sellers</h3>
          <div class="widget-body">
            <div class="beta-sales beta-lists">
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- best sellers widget -->
        <div class="widget">
          <h3 class="widget-title">New Products</h3>
          <div class="widget-body">
            <div class="beta-sales beta-lists">
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png"
                    alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- best sellers widget -->
      </div>
    </div>
  </div> <!-- #content -->
</div> <!-- .container -->

@endsection
