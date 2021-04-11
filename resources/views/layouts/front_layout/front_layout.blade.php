
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Stack Developers online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Front style -->
{{--    <link id="callCss" rel="stylesheet" href="{{url('css/front_css/front.min.css')}}" media="screen"/>--}}
    <link href="{{url('css/front_css/base.css')}}" rel="stylesheet" media="screen"/>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Front style responsive -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{url('css/front_css/front-responsive.min.css')}}" rel="stylesheet"/>--}}
    {{--    <link href="{{url('css/front_css/font-awesome.css')}}" rel="stylesheet" type="text/css">--}}
    <!-- Google-code-prettify -->
{{--    <link href="{{url('js/front_js/google-code-prettify/prettify.css')}}'" rel="stylesheet"/>--}}
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{url('images/front_images/ico/favicon.ico')}}">
    <!-- box  icons -->
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
{{--    <link rel="preconnect" href="https://fonts.gstatic.com">--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com">--}}
   @if($language=="ar")
        <link href="{{url('css/front_css/bardouni_ar_style.css')}}" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    @else
        <link href="{{url('css/front_css/bardouni_style.css')}}" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300&display=swap" rel="stylesheet">
    @endif

    {{--    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('images/front_images/ico/apple-touch-icon-144-precomposed.png')}}'">--}}
{{--    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('images/front_images/ico/apple-touch-icon-114-precomposed.png')}}'">--}}
{{--    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('images/front_images/ico/apple-touch-icon-72-precomposed.png')}}'">--}}
{{--    <link rel="apple-touch-icon-precomposed" href="{{url('images/front_images/ico/apple-touch-icon-57-precomposed.png')}}'">--}}
{{--    <style type="text/css" id="enject"></style>--}}


    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<body>

@if($language=="ar")
    @include('layouts.front_layout.ar.front_header_ar')

 @else
    @include('layouts.front_layout.en.front_header')
@endif









@include('layouts.front_layout.login_layout')


<!-- Header End====================================================================== -->

{{--@if(isset($page_name) && $page_name =='title')--}}

{{--    <div id="carouselBlk" >--}}

{{--        <div id="myCarousel"  class="carousel slide" >--}}
{{--            <div class="carousel-inner">--}}
{{--                @foreach($banners as $banner)--}}
{{--                <div class="item @if($banner['id'] == 1) active @endif">--}}
{{--                    <div class="container">--}}
{{--                        <a href="{{$banner['url']}}"><img style="width:100%" src="{{url('/images/banner_images/'.$banner['image'])}}" alt="special offers"/></a>--}}
{{--                        <div class="carousel-caption"  >--}}
{{--                            <h4>First Thumbnail label</h4>--}}
{{--                            <p>{{$banner['title']}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>--}}
{{--            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>--}}


{{--        </div>--}}

{{--    </div>--}}
{{-- @endif--}}
{{--<div id="mainBody">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--          <!-- Sidebar ================================================== -->--}}
{{--        @if($language=="ar")--}}
{{--            @include('layouts.front_layout.ar.front_sidebar_ar')--}}
{{--        @else--}}
{{--            @include('layouts.front_layout.en.front_sidebar')--}}
{{--        @endif--}}

{{--        <!-- Sidebar end=============================================== -->--}}

{{--        @if($language=='ar')--}}
{{--                @yield('arabic_content');--}}
{{--            @else--}}
{{--                @yield('content');--}}
{{--        @endif--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Footer End====================================================================== -->


{{--@if($language=="ar")--}}
{{--    @include('layouts.front_layout.ar.front_footer_ar')--}}
{{--@else--}}
{{--    @include('layouts.front_layout.en.front_footer')--}}
{{--@endif--}}


{{--<!-- Placed at the end of the document so the pages load faster ============================================= -->--}}
<script src="{{url('js/front_js/jquery.js')}}" type="text/javascript"></script>
<script src="{{url('js/front_js/front_scripts.js')}}" type="text/javascript"></script>
{{--<script src="{{url('js/front_js/front.min.js')}}" type="text/javascript"></script>--}}
<script src="{{url('js/front_js/google-code-prettify/prettify.js')}}"></script>

{{--<script src="{{url('js/front_js/front.js')}}"></script>--}}
<script src="{{ mix('/js/app.js') }}" defer></script>
<script src="{{url('js/front_js/jquery.lightbox-0.5.js')}}"></script>


</body>
</html>
