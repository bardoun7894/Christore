$(document).ready(function () {
   //check Admin Password is correct or not
    var localization= document.location.href.split("/")[3];
   $("#current_password").keyup(function (){

   var currentPassword = $("#current_password").val();

       console.log(document.location.href.split("/")[3] )

   $.ajax(
        {
           type:'post',
           url:'/'+localization+'/admin/check_current_password',
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
               url: '/'+localization+'/admin/update-section-status',
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
           { type: 'post',
               url: '/'+localization+'/admin/update-category-status',
               data : {category_id:category_id, status:status},
               success:function (resp){
                 if(resp['status'] === 1){
                   $("#category-"+category_id).html("  <a class='updateCategoryStatus' href='javascript:void(0)' style='color: dodgerblue'>active</a>")
                 }else{
                   $("#category-"+category_id).html("  <a class='updateCategoryStatus' href='javascript:void(0)' style='color: grey'>inactive</a>")
                     }
                 },error:function (one,thwo,three){
                   console.log(thwo);
                   console.log(one);
                   console.log(three);
              }
           }
       )
   });

   $('.updateProductStatus').click(function(){
      var product_id = $(this).attr('product_id');
      var status = $(this).text();
      console.log('status'+status)
      console.log('product_id'+product_id)
      $.ajax(
          {
            type:'post',
            url: '/'+localization+'/admin/update-product-status',
            data:{product_id:product_id,status:status},
            success:function (resp){
          if(resp['status']===1){
              $("#product-"+product_id).html("  <a class='updateProductStatus' href='javascript:void(0)' style='color: dodgerblue'>active</a>")
            }
          else
            {
              $("#product-"+product_id).html("  <a class='updateProductStatus' href='javascript:void(0)' style='color: grey'>inactive</a>")
            }
              },error:function (one,thwo,three){
                  console.log(thwo);
                  console.log(one);
                  console.log(three);
              }
          }
            )
   });

   $('#section_id').change((function (){
       var section_id = $(this).val()
       $.ajax({
           type:'post',
           url:'/'+localization+'/admin/append-category-level',
           data:{section_id:section_id},
           success:function (resp){
             $('#appendCategoriesLevel').html(resp)
           },error:function (one,thwo,three){
             console.log(thwo);
             console.log(one);
             console.log(three);
           }
       })
   }));
   $(".confirmDelete").click(function (){
      var record =$(this).attr("record");
      var recordid = $(this).attr("recordid");
      console.log(record)
      console.log(recordid)
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
      var recordName = $(this).attr("recordName");

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
             window.location.href ="/admin/delete-"+recordName+"-"+record+"/"+recordid;
           }
       })
   });









 const inpfile=document.getElementById('main_image');
 const previewContainer=document.getElementById('image_preview');
 const previewImage=previewContainer.querySelector('.image_preview_image');
 const impo=previewContainer.querySelector('.impo');
 const previewtext=previewContainer.querySelector('.image_preview_default_text');
    if(inpfile){
        inpfile.addEventListener('change',function (){
            const file =this.files[0];
           if(file){
               const reader =new FileReader();
               previewtext.style.display="none";
               previewImage.style.display="block"

               reader.addEventListener('load',function (){
                   previewImage.setAttribute('src',this.result);
                   impo.style.display = "none"
               })


               reader.readAsDataURL(file);
           }else{
               previewtext.style.display = null;
               previewImage.style.display=null;
               previewImage.setAttribute('src',"");

           }
        });
    }




});
