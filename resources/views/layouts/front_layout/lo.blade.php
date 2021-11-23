
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

<body>
<nav class="nav">
    <div class="social-call">
        <div class="social">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-youtube"></i></a>
        </div>
        <div class="phone">
           <a><i class="fas fa-phone-alt"></i> +212708150351 </a>
        </div>
    </div>
{{--  menu bar--}}
  <div class="navigation">
{{--      logo--}}
      <a href="#" class="logo">
          <img src="{{url('/images/bardou.png')}}"  alt=""/>
{{--  menu--}}
      <ul class="menu">
          <li><a href="#">Home</a> </li>
          <li> <a href="#">Men</a>
              {{--  sale lable--}}
               <span class="sale-lable">Sale</span>
          </li>
          <li><a href="#">Women</a></li>
          <li><a href="#">Kids</a></li>
      </ul>
{{--          right menu--}}
      <div class="right-menu">
              <a href="#" class="search">
               <i class="fas fa-search"></i>
              </a>
              <a href="#" class="user">
                <i class="fas fa-user"></i>
              </a>
              <a href="#">
           <i class="fas fa-shopping-cart">
               <span class="num-cart-product"> 0 </span>
           </i>
              </a>
          </div>
      </a>
  </div>

</nav>

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
<section class="new-arrival"> 
  <div class="arrival-heading">
    <strong> New Arrival</strong>
        <p>We provide you new design Fashion Clothes</p>
  </div>
<div class="product-container">
  {{-- product box --}}
  @for ($i = 0; $i <= 6; $i++)
      <div class="product-box">
        {{-- image --}}
        <div class="product-img">
           <img src="{{url('/images/product_image/feature_1.jpg')}}" alt="">
        </div>  
        {{-- details --}}
      <div class="product-details">
          <a href="#" class="p-name">Drawstring T-shirt</a>
          <span class="p-price">$100</span> 
      </div>
      </div>
  @endfor

</div>
</section>


</body>

</html>
