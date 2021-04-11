$(document).on('click','.search',function () {
$('.search-bar').addClass('search-bar-active');
});
//
// $(document).on('click','.user',function () {
// $('.form').addClass('login-active');
// });
$(document).on('click','.search-cancel',function () {
$('.search-bar').removeClass('search-bar-active');
});
$(document).on('click','.form-cancel',function () {
$('.form').removeClass('login-active').removeClass('sign-up-active');
});
$(document).on('click','.sign-up-btn',function () {
    $('.form').removeClass('login-active').addClass('sign-up-active');
});
$(document).on('click','.user,.already-have-account',function () {
    $('.form').removeClass('sign-up-active').addClass('login-active');
});

// slider adapter
$(document).ready(function() {
    $('#adaptive').lightSlider({
        adaptiveHeight:true,
        item:1,
        slideMargin:0,
        auto:true,
        loop:true,
        enableDrag:true

    });
});
