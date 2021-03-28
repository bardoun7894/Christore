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

   $('.updateAttributeStatus').click(function (){
     var attr_id = $(this).attr('attr_id')
     var status = $(this).text();
       $.ajax({
           type:'post',
           data:{attr_id:attr_id,status:status},
           url:'/'+localization+'/admin/update-attribute-status',
           success:function (resp){
               if(resp['status']===1){
                   $("#attr-"+attr_id).html("  <a class='updateAttributeStatus' href='javascript:void(0)' style='color: dodgerblue'>active</a>")
               }else{
                   $("#attr-"+attr_id).html("  <a class='updateAttributeStatus' href='javascript:void(0)' style='color: grey'>inactive</a>")
               }

           },

       })


   });
   $('.updateProductImageStatus').click(function (){
     var product_image_id = $(this).attr('product-image_id')
     var status = $(this).text();
       $.ajax({
           type:'post',
           data:{product_image_id:product_image_id,status:status},
           url:'/'+localization+'/admin/update-product-image-status',
           success:function (resp){
               if(resp['status']===1){
                   $("#product-image-"+product_image_id).html("  <a class='updateProductImageStatus' href='javascript:void(0)' style='color: dodgerblue'>active</a>")
               }else{
                   $("#product-image-"+product_image_id).html("  <a class='updateProductImageStatus' href='javascript:void(0)' style='color: grey'>inactive</a>")
               }

           },

       })


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

    // (1) add remove fields automatically
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top: 10px">   <input type="text" id="size" name="size[]"  value="" placeholder="Size" style="width:  80px"/>\n' +
        '                                     <input type="text" id="sku" name="sku[]"   value="" placeholder="Sku"  style="width:   80px"/>\n' +
        '                                     <input type="text" id="price" name="price[]" value="" placeholder="Price" style="width: 80px"/>\n' +
        '                                     <input type="text" id="stock"  name="stock[]" value="" placeholder="Stock" style="width: 80px"/>\n<a href="javascript:void(0);" class="remove_button fas fa-minus"> </a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    // (2) display current image in products
 const inpfile=document.getElementById('product_image');
 const previewContainer=document.getElementById('image_preview');
 const previewImage=previewContainer.querySelector('.image_preview_image');
 const previewtext=previewContainer.querySelector('.image_preview_default_text');
  if(inpfile){
        inpfile.addEventListener('change',function (){
            const file =this.files[0];
           if(file){
               const reader =new FileReader();
               console.log(file);
               previewtext.style.display  = "none";
               previewImage.style.display = "block"
               reader.addEventListener('load',function (){
                   console.log(this.result);
                  previewImage.setAttribute('src',this.result);
               })
               reader.readAsDataURL(file);
           }
        });
    }



});
