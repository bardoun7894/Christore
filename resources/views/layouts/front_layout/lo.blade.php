
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
{{--    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />--}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Glidejs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="{{url('css/font_css/front_en.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

<div class="form">
    <div class="login-form">
         <a class="login-form-cancel"><i class="fas fa-times"></i></a>
         <strong>Log In</strong>
       <form>
          <input type="email" placeholder="Example@email.com" name="email">
          <input type="password" placeholder="*******" name="password">
          <input type="submit" value="log in">
       </form>
{{--        forget and sign up btn--}}
        <div class="form-btns">
            <a href="#" class="forget">Forget Your Password ? </a>
            <a href="#" class="sign-up-btn">Create Account </a>
        </div>
     </div>
    <div class="sign-up-form">
         <a class="sign-up-form-cancel"><i class="fas fa-times"></i></a>
         <strong>Sign UP</strong>
       <form>
          <input type="text" placeholder="Name" name="email" required="">
          <input type="tel" placeholder="phone number" name="phone" required="">
          <input type="email" placeholder="Example@email.com" name="email" required="">
          <input type="password" placeholder="*******" name="password" required="">
          <input type="submit" value="Sign Up">
       </form>
{{--        forget and sign up btn--}}
        <div class="form-btns">
{{--            <a href="#" class="forget">Forget Your Password ? </a>--}}
            <a href="#" class="login-btn">Log In </a>
        </div>
     </div>
</div>

{{--full slider--}}
<div class="full-slider-box">
<!-- slider-text container-!?-->
  <div class="slider-text-container">
      <span>Limited Offer </span>
      <strong>30% off with promo code</strong>
      <a href="#" class="f-slider-btn"> Shop Now </a>
  </div>
</div>





<!-- Glidejs -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>--}}
{{--<!-- Custom Scripts -->--}}
{{--<script src="./js/products.js"></script>--}}
{{--<script src="./js/slider.js"></script>--}}
{{--<script src="./js/index.js"></script>--}}
{{--<script type="javascript" href="{{url('js/JQuery')}}"></script>--}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{url('/js/front_js/front_js.js')}}"></script>
</body>

</html>
