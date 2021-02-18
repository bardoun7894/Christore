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

   $(".updateSectionStatus").click(function(){
       var status =$(this).text();
       var section_id =$(this).attr("section_id");
       $.ajax(
           {
               type: 'post',
               url: '/admin/update-section-status',
               data: {section_id:section_id,status:status},
               success:function (resp){

                   if(resp['status'] === 1){
                    $("#section-"+section_id).html("   <a class='updateSectionStatus' href='javascript:void(0)' style='color: dodgerblue'>active</a>")
                       }else{
                       $("#section-"+section_id).html("   <a class='updateSectionStatus' href='javascript:void(0)' style='color: grey'>inactive</a>")
                   }
                 },error:function (){
                    alert("error");
               }
           }
       )
   });
   $(".updateCategoryStatus").click(function(){
       var status =$(this).text();
       var category_id =$(this).attr("category_id");
       $.ajax(
           {
               type: 'post',
               url: '/admin/update-category-status',
               data: {category_id:category_id,status:status},
               success:function (resp){
                 if(resp['status'] === 1){
                   $("#category-"+category_id).html("   <a class='updateCategoryStatus' href='javascript:void(0)' style='color: dodgerblue'>active</a>")
                 }else{
                   $("#category-"+category_id).html("   <a class='updateCategoryStatus' href='javascript:void(0)' style='color: grey'>inactive</a>")
                   }
                 },error:function (){
                    alert("error");
               }
           }
       )
   });
   $('#section_id').change((function (){
       var section_id = $(this).val()
       $.ajax({
           type:'post',
           url:'/admin/append-category-level',
           data:{section_id:section_id},
           success:function (resp){
              $('#appendCategoriesLevel').html(resp)
           },error:function (error){

               console.log("error "+ error);
           }
       })
   }));
   $(".confirmDelete").click(function (){
      var record =$(this).attr("record");
      var recordid = $(this).attr("recordid");
       Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
           if (result.isConfirmed) {
             Swal.fire(
                   'Deleted!',
                   'Your file has been deleted.',
                   'success'
                 )
             window.location.href ="/admin/delete-"+record+"/"+recordid;
           }
       })
   });

   $(".confirmDeleteImage").click(function (){
      var record =$(this).attr("record");
      var recordid = $(this).attr("recordid");
       Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
           if (result.isConfirmed) {
             Swal.fire(
                   'Deleted!',
                   'Your file has been deleted.',
                   'success'
                 )
             window.location.href ="/admin/delete-category-"+record+"/"+recordid;
           }
       })
   });


});
