@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($type_product as $l)

                        <li><a href="/type/{{$l->id}}">{{$l->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">

                        <br>
                        @foreach($type_product as $loai)
                        @if( $sp_theoloai[0]->id_type == $loai->id )
                        <h4 style="text-align:center;   font-weight: bold;"> {{$loai->name}}</h4>
                        @endif
                        @endforeach

                        <div class="beta-products-details">
                            <p class="pull-left">{{count($sp_theoloai)}} styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sp_theoloai as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href=""><img width="200" height="200"
                                                src="/source/image/product/{{$sp->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                            @if($sp->promotion_price==0)
                                            <span class="flash-sale">{{number_format($sp->unit_price)}} Đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($sp->unit_price)}} Đồng </span>
                                            <span class="flash-sale">{{number_format($sp->promotion_price)}} Đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="add-to-cart pull-left" href="#"><i class="fa fa-heart"></i></a>
                                        <a class="beta-btn primary" href="/type/{{$sp->id}}">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($sp_khac)}}founded</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sp_khac as $khac)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href=""><img width="200" height="200"
                                                src="/source/image/product/{{$khac->image}}" alt=""></a>
                                    </div>
                                    @if($khac->promotion_price==!0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$khac->name}}</p>
                                        <p class="single-item-price" style="text-align:left;font-size: 15px;">
                                            @if($khac->promotion_price==0)

                                            <span class="flash-sale">{{number_format($khac->unit_price)}} Đồng</span>
                                            @else
                                            <span class="flash-del">{{number_format($khac->unit_price)}} Đồng </span>
                                            <span class="flash-sale">{{number_format($khac->promotion_price)}}
                                                Đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i
                                                class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sp_khac->links("pagination::bootstrap-4")}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->

        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection