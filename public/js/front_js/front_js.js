var localization;
$(document).on('click','.user',function (){
    $(".form").addClass('login-form-active');
})
$(document).on('click','.login-form-cancel',function (){
    $(".form").removeClass('login-form-active')
})
$(document).on('click','.sign-up-form-cancel',function (){
    $(".form").removeClass('sign-up-form-active')
})
$(document).on('click','.sign-up-btn',function (){
    $(".form").addClass('sign-up-form-active').removeClass('login-form-active')
});
$(document).on('click','.login-btn',function (){
    $(".form").addClass('login-form-active').removeClass('sign-up-form-active')
});
$(document).on( 'ready',function(){
    $("#adaptive").lightSlider({
       item:1,
       autoWidth: true,
    });

});

//for slider where screen is less than 768px
var width =  window.innerWidth;
$(document).on('ready', function(){

      localization= document.location.href.split("/")[3];
    $("#autoWidth").lightSlider({
       item:width<900?3:5,
    });
});
// for fix menu when scroll down and top
$(window).on('scroll', function(){
  if($(document).scrollTop() > 50) {
        $('.navigation').addClass('fix-nav');
    }else{
        $('.navigation').removeClass('fix-nav');
    }
});
// for responsive   menu
jQuery(function() {
    $(".toggle").on('click',function(){
        $(".toggle").toggleClass("active");
        $(".navigation").toggleClass("active");
    })

})

$(document).on('click','.search',function (){
    $(".search-bar").addClass('search-bar-active')
})
$(document).on('click','.search-cancel',function (){
    $(".search-bar").removeClass('search-bar-active')
})  ;

$(document).on('ready',function () {
    $('#sort').on('change',function (){
        this.form.submit();
    })
} );

