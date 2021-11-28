
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Glidejs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="{{url('css/font_css/front_en.css')}}"  />
    <link rel="stylesheet" href="{{url('css/font_css/lightslider.css')}}"  />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('js/lightslider.js')}}"></script>
    <script rel="stylesheet" src="{{url('/js/front_js/front_js.js')}}"></script>

    <title>Bardouni Store - Ecommerce Website</title>
</head>

<body   @if($language == 'ar')style="direction:rtl"@endif>
@include('layouts.front_layout.nav') 
{{--search bar --}}

<div class="search-bar">
    <a href="#" class="search-cancel"> <i class="fas fa-times"></i></a>
    {{--    search input--}}
    <div class="search-input">
       <input type="text" placeholder="Search for product">
    </div>
</div>
{{--login and signup--}}
@include('layouts.front_layout.login_signup')
 
{{--full slider--}}
@include('layouts.front_layout.banner')
{{-- end full-slider-box --}}

{{-- Featured Categories --}}
<div class="feature-heading">
    <h2>Featured Categories</h2>
</div> 
@include('layouts.front_layout.featured_categories')

<!-- new arrival-->
@include('layouts.front_layout.new_arrival')
 
{{--  end new arrival --}}

 {{-- offer --}}
@include('layouts.front_layout.offer')

<!-- featured propducts-->
@include('layouts.front_layout.featured_products')
 
{{-- services --}}
 @include('layouts.front_layout.services')

{{-- footer --}}

<footer>
 @include('layout.front_layout.footer')
</footer>

</body>

</html>
