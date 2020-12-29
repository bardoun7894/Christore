$(document).ready(function () {
   //check Admin Password is correct or not
   $("#current_password").keyup(function (){
   var currentPassword = $("#current_password").val();

   $.ajax(
        {
           type:'post',
           url:'/admin/check_current_password',
           data:{currentPassword:currentPassword},
           success:function (resp) {
         if(resp==="false"){
             $("#chkCurrentPwd").html("<font color='red'>Current password is Incorrect</font>")
               }
         else if(resp==="true"){
             $("#chkCurrentPwd").html("<font color='green'>Current password is correct</font>")
                   }
             },error:function () {
                alert("Error")
            }
          }
      )
    });
});
