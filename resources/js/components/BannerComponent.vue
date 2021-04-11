<template>


    <div class="card-body">

        <table  class="table table-striped">
            <thead >
                <tr>
                         <th scope="col">#</th>
                          <th scope="col">image</th>
                          <th scope="col">url</th>
                          <th scope="col">title</th>
                          <th scope="col">alt</th>
                          <th scope="col">status</th>
                          <th scope="col">actions</th>
                </tr>
            </thead>

            <tbody>
            <tr v-for="banner in banners">
                <td>
                    {{banner.id}}
                </td>
                <td>
                    <img :src="'/images/banner_images/'+banner.image" alt="" width="200" height="100" />
                </td>
                <td>
                    {{banner.url}}
                </td>
                <td>
                    {{banner.title}}
                </td>
                <td>
                    {{banner.alt}}
                </td>
                <td >
<!--                    update status with vue js -->

                   <p  @click="updateStatus(banner.id,banner.status)"  >
                        <a   style="color: dodgerblue" v-if=" banner.status===1" >
                            <i class='fas fa-toggle-on' ></i>
                        </a>
                    <a  @click="updateStatus(banner.id,banner.status)"  style="color: grey" v-else >
                            <i class='fas fa-toggle-off' ></i>
                     </a>
                   </p>
                </td>
                <td>
                    <a style="color: mediumseagreen" title="edit brand" @click="addPage(banner.id)" :href='edit_url' ><i class="far fa-edit"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a  class="confirmDelete" @click="deleteBanner(banner.id)" title="remove brand"  style="color: red"   href="javascript:void(0)" >
                        <i class="far fa-trash-alt"> </i></a>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
var localization= document.location.href.split("/")[3];
    export default {
       data(){

    return {
 posts: {}
,  edit_url:'',
   banner_image:'',
       banners:[

        ]
    }
           },
        mounted() {
            console.log('Component mounted.');
            this.getBanners();
        },
        methods:{
           addPage(id){
            this.edit_url = '/'+localization+'/admin/add-edit-banner/' +id ;
           },
            deleteBanner(id){
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
               // window.location.href ="/admin/delete-"+recordName+"-"+record+"/"+recordid;
                  axios.delete('/api/banner/' + id ).then(res=>console.log(res)).then(err=>console.log(err));
                  this.getBanners();
                    }
                })

            },
            updateStatus(id,status){
         console.log(status+" "+id);
         if(status===1){
          axios.put('/api/banner/'+id,{
                 item:{
                     'status':0
                     }
             });
         }else{
             axios.put('/api/banner/'+id,{
                 item:{
                     'status':1
                 }
               });
             }
           this.getBanners();
           },
            getBanners()
            {
                return axios.get('/api/banners').then(  res =>  this.banners = res.data
                ).then(err=>console.log(err));
            }
        }
    }
</script>
