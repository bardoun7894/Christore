<?php

use App\Models\Section;
$sections=Section::sections();
?>

<div id="sidebar" class="span3 pull-right">
    <div class="well well-small " style="direction: rtl" ><a id="myCart" href="product_summary.html" ><img   src="{{url('images/front_images/ico-cart.png')}}" alt="cart"> 3 عناصر في السلة </a></div>
    <ul id="sideMenu" class="nav nav-tabs nav-stacked" style="direction: rtl; font-size: 15px">
        @foreach($sections as $section)
            <li class="subMenu"><a>
                    @switch($section->name)
                        @case('Men')
                        {{__('messages.men')}}
                        @break
                        @case('Women')
                        {{__('messages.women')}}
                        @break
                        @case('Kids')
                        {{__('messages.kids')}}
                        @break
                    @endswitch()</a>
                @foreach($section['categories'] as $category)
                    <ul>
                        <li><a href="products.html"><i class="icon-chevron-left"></i><strong>{{$category->category_name}}</strong></a></li>
                        @foreach($category['subcategories'] as $subcategory)
                            <li><a href="products.html"><i class="icon-chevron-left"></i> {{$subcategory->category_name}}</a></li>
                        @endforeach

                    </ul>
                @endforeach

            </li>
        @endforeach

    </ul>
    <br/>
    <div class="thumbnail">
        <img src="{{url('images/front_images/payment_methods.png')}}" title="Payment Methods" alt="Payments Methods">
        <div class="caption">
            <h5>طرق الدفع</h5>
        </div>
    </div>
</div>
