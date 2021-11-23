$(document).on('click','.search',function (){
    $(".search-bar").addClass('search-bar-active')
})
$(document).on('click','.search-cancel',function (){
    $(".search-bar").removeClass('search-bar-active')
})  ;
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
$(document).ready( function(){
    $("#adaptive").lightSlider({
       item:1,
       autoWidth: true, 
    });
  
});

$(document).ready( function(){
    $("#autoWidth").lightSlider({
     item:5
    
    });
  
});