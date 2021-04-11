<template>
<div >
    <a  href="#" class="form-cancel"><i class='bx bx-x'></i></a>
<!--    <div class="login-form">-->
<!--        <strong>{{ __('messages.login') }}</strong>-->
<!--        <form action="#">-->
<!--            <input  type="email" name="email" placeholder="Example@email.com" >-->
<!--            <input  type="password"  name="password"  placeholder="{{__('messages.password')}}"   >-->
<!--            <input  type="submit" value="{{__('messages.login')}}">-->
<!--        </form>-->
<!--        <div class="form-btns">-->
<!--            <a href="#" class="forget">{{__('messages.forgetـpassword')}}</a>-->
<!--            <a href="#" class="sign-up-btn">{{__('messages.create_account')}}</a>-->
<!--        </div>-->
<!--    </div>-->
 <div >{{this.getData()}}</div>
</div>

</template>

<script>
export default {
data(){
return{

}
},methods:{
    getData(){
          d ="<?php echo 'messahe'  ?>";

    },
        getLanguage(){
            return  document.location.href.split("/")[3];

        }
    }
}
</script>

<style scoped>

</style>
