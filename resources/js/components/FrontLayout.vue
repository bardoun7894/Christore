<template>
<div v-if="getLanguage() === 'ar' "  >
<arabic-header></arabic-header>

</div>
<div v-else  >
    <normal-header></normal-header>
</div>

</template>

<script>
export default {
data(){
 return {

    };
},
mounted(){

},methods:{
    getLanguage(){
      return  document.location.href.split("/")[3];
    }
    }
}
</script>

<style scoped>

</style>
