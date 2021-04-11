
@extends('layouts.front_layout.front_layout')
@section('arabic_content')
    <div class="span9">
        <div class="well well-small">
            <h4 style="direction: rtl ;color: #0e90d2">المنتجات المميزة</h4>
            <div class="row-fluid">
                <div id="featured" @if($featuredItemCount > 4 ) class="carousel slide" @endif>
                    <div class="carousel-inner">

                        @foreach($featuredItemChunk as $key=>$featuredItem)
                            <div class="item @if($key==1) active @endif ">
                                <ul class="thumbnails">
                                    @foreach($featuredItem  as $item)
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <i class="tag"></i>
                                                @if(!empty($item['main_image']) && file_exists("images/product_image/small/".$item['main_image']))
                                                    <a href="product_details.html"><img src="{{url('/images/product_image/small/'.$item['main_image'])}}" alt=""></a>
                                                @else
                                                    <a href="product_details.html"><img src="{{url('/images/no-image.png')}}" alt=""></a>
                                                @endif
                                                <div class="caption">
                                                    <h5>{{$item['product_name']}}</h5>
                                                    <h4><a class="btn" href="product_details.html">VIEW</a> <span style="color: red" class="pull-right">{{$item['product_price']}} DH</span></h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        @endforeach

                    </div>
{{--                    <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>--}}
{{--                    <a class="right carousel-control" href="#featured" data-slide="next">›</a>--}}
                </div>
            </div>
        </div>
        <h4 style="direction: rtl ;color: dodgerblue"> اخر المنتجات</h4>
        <ul class="thumbnails">
            @foreach($newProduct as $latestProduct)
                <li class="span3">
                    <div class="thumbnail">
                        <a  href="product_details.html"><img src="{{url('images/product_image/small/'.$latestProduct['main_image'])}}" alt=""/></a>
                        <div class="caption">
                            <h5>{{$latestProduct['product_name']}}</h5>
                            <p>
                                {{$latestProduct['description']}}
                            </p>

                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> {{$latestProduct['product_price']}}</a></h4>
                        </div>
                    </div>
                </li>

            @endforeach

        </ul>
    </div>
@endsection
