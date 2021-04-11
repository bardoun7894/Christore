<div id="featured" class="carousel slide">
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
    <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
    <a class="right carousel-control" href="#featured" data-slide="next">›</a>
</div>
