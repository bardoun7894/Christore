/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from "vue";
require('lang.js');

require('./bootstrap');

window.Vue = require('vue').default;
import VueLang from '@eli5/vue-lang-js'

// get the data source
import translations from './vue-translations.js';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('banner-component' , require('./components/BannerComponent.vue').default);
Vue.component('front-layout' , require('./components/FrontLayout.vue').default);
Vue.component('arabic-header' , require('./components/ArabicHeader.vue').default);
Vue.component('normal-header' , require('./components/NormalHeader.vue').default);
Vue.component('login-form' , require( './components/LoginForm.vue').default);
Vue.component('register-form' , require('./components/RegisterForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
Vue.use(VueLang, {
    messages: translations, // Provide locale file
    // locale: 'en', // Set locale
    fallback: 'en' // Set fallback lacale
});
