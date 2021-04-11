<?php
use App\Models\Section;
$sections=Section::sections();
?>
<nav>
    <div class="social-call">
{{--        social 0links--}}
        <div class="social">
            <a><i class='bx bxl-facebook'></i></a>
            <a> <i class='bx bxl-twitter'></i></a>
            <a>  <i class='bx bxl-youtube'></i></a>
            <a>  <i class='bx bxl-instagram'></i></a>
            <a>  <i class='bx bxl-whatsapp'></i></a>
        </div>
{{--        phone 0links--}}
         <div class="phone">
             <span ><i class='bx bx-phone bx-tada' style='color:#afadad '></i></span>
             <span>+212708150351</span>
         </div>
    </div>
     <div class=" navigation">
    {{--menu bar--}}
    <div href="#" class="logo">
        <img src="{{asset("/images/bardou.png")}}" alt="">
    </div>
    {{--    menu--}}
      <ul class="menu">
        <li><a href="#">سوق </a></li>
        <li><a href="#">رجال </a>
            <span class="sale_lable">تخفيضات</span>
        </li>
        <li><a href="#">نسائية </a></li>
        <li><a href="#"> أطفال</a></li>

        <li><a href="#">الرئيسية </a></li>
    </ul>
    {{--    rigght menu--}}
    <div class="right-menu">
        <a href="#" class="search">
            <i class='bx bx-search'  ></i>
        </a>
        <a href="#" class="user">
            <i class='bx bx-user'></i>
        </a>
        <a href="#">
            <i class='bx bxs-cart-alt' >
            {{--            number of product in cart--}}
                <span class="number-cart-product"> 0</span>
            </i>
        </a>
      </div>
     </div>
</nav>

<div class="search-bar" >
    <div class="search-input" style="display: inline-block" >
        <a href="#" class="search-cancel"><i class='bx bx-x'></i></a>
            <input type="text" placeholder="ابحث عن المنتج"  >
    </div>
</div>

{{--    <div class="navbarbardouni"  >--}}
{{--                <div class="row">--}}
{{--                    <img src="/images/cart.png" width="20px" height="20px" alt="">--}}
{{--                    <img src="/images/product_image/small/search.png" width="20px" height="20px" alt="">--}}
{{--                </div>--}}
{{--                <img src="/images/product_image/small/logo-white.png" width="80px" height="20px" alt="">--}}
{{--                <img src="/images/menu.png" width="20px" height="20px" alt="">--}}

{{--  <!-- Navbar ================================================== -->--}}
{{--        <section id="navbar">--}}
{{--            <div class="navbar" >--}}
{{--                <div  style="direction: ltr">--}}
{{--                   <div class="pull-right" style="direction: rtl;width: auto;">--}}
{{--                       <div  >--}}
{{--                           <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">--}}
{{--                               <span class="icon-bar"></span>--}}
{{--                               <span class="icon-bar"></span>--}}
{{--                               <span class="icon-bar"></span>--}}
{{--                           </a>--}}
{{--                           --}}{{----}}{{--                        <a class="brand pull-right" href="#" >Bardou store</a>--}}

{{--                           <div   >--}}
{{--                               <ul class="nav">--}}
{{--                                   @foreach($sections as $section)--}}
{{--                                       <li class="dropdown" >--}}
{{--                                           <a href="#" class="dropdown-toggle " style="color: white" data-toggle="dropdown">--}}
{{--                                               @switch($section->name)--}}
{{--                                                   @case('Men')--}}
{{--                                                   {{__('messages.men')}}--}}
{{--                                                   @break--}}
{{--                                                   @case('Women')--}}
{{--                                                   {{__('messages.women')}}--}}
{{--                                                   @break--}}
{{--                                                   @case('Kids')--}}
{{--                                                   {{__('messages.kids')}}--}}
{{--                                                   @break--}}
{{--                                               @endswitch()--}}
{{--                                               <b class="caret"></b></a>--}}
{{--                                           <ul class="dropdown-menu" style="direction: rtl" >--}}
{{--                                               <li class="divider"></li>--}}
{{--                                               @foreach($section['categories'] as $category)--}}
{{--                                                   <li class="nav-header "><a href="#" > &nbsp;&nbsp; <p  style="color: dodgerblue; font-size: small; direction: rtl">{{$category->category_name}} </p>  </a></li>--}}
{{--                                                   @foreach($category['subcategories'] as $subcategories)--}}
{{--                                                       <li><a    href="#" style="direction: rtl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$subcategories->category_name}}</a></li>--}}
{{--                                                   @endforeach--}}
{{--                                                   <li class="divider"></li>--}}
{{--                                               @endforeach--}}
{{--                                           </ul>--}}
{{--                                       </li>--}}

{{--                                   @endforeach--}}
{{--                                   --}}{{----}}{{--                                <li><a href="#">About</a></li>--}}
{{--                                   <li class="active"  ><a href="#">{{__('messages.home')}}</a></li>--}}
{{--                               </ul>--}}
{{--                               --}}{{----}}{{--                            <form class="navbar-search pull-left" action="#">--}}
{{--                               --}}{{----}}{{--                                <input type="text" class="search-query span2" placeholder="Search"/>--}}
{{--                               --}}{{----}}{{--                            </form>--}}
{{--                               --}}{{----}}{{--                            <ul class="nav pull-left">--}}
{{--                               --}}{{----}}{{--                                <li><a href="#">Contact</a></li>--}}
{{--                               --}}{{----}}{{--                                <li class="divider-vertical"></li>--}}
{{--                               --}}{{----}}{{--                                <li><a href="#">Login</a></li>--}}
{{--                               --}}{{----}}{{--                            </ul>--}}
{{--                           </div><!-- /.nav-collapse -->--}}

{{--                       </div>--}}
{{--                   </div>--}}
{{--                    </div><!-- /navbar-inner -->--}}

{{--            </div><!-- /navbar -->--}}
{{--        </section>--}}
{{--    </div></div>--}}

