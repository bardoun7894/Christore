<template>

<div  >
    <nav>

        {{Lang.get('messages.home')}}
        <div class="social-call">
            <!--         // &#45;&#45;        social 0links&#45;&#45; -->
            <div class="social">
                <a><i class='bx bxl-facebook'></i></a>
                <a> <i class='bx bxl-twitter'></i></a>
                <a>  <i class='bx bxl-youtube'></i></a>
                <a>  <i class='bx bxl-instagram'></i></a>
                <a>  <i class='bx bxl-whatsapp'></i></a>
            </div>
            <!--    phone link-->
            <div class="phone">
                <span ><i class='bx bx-phone bx-tada' style='color:#afadad '></i></span>
                <span>+212708150351</span>
            </div>
        </div>
        <div class=" navigation">

                <div href="#" class="logo">
                    <img src="/images/bardou.png" alt="">
                </div>

            <ul class="menu">
                <li><a href="#">سوق </a></li>
                <li><a href="#">رجال </a>
                    <span class="sale_lable">تخفيضات</span>
                </li>
                <li><a href="#">نسائية </a></li>
                <li><a href="#"> أطفال</a></li>

                <li><a href="#">الرئيسية </a></li>
            </ul>
            <!--      rigght menu -->
            <div class="right-menu">
                <a href="#" class="search">
                    <i class='bx bx-search'  ></i>
                </a>
                <a href="#"  class="user">
                    <i class='bx bx-user'></i>
                </a>
                <a href="#">
                    <i class='bx bxs-cart-alt' >
                        <!--                 number of product in cart -->
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
<!--    <login-form></login-form>-->
</div>

</template>

<script>
export default {
    data(){

},
 mounted() {
    },
   methods: {}
}
</script>

<style scoped>

</style>
