
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
import { load } from 'vue-google-maps'
load({
  key: 'AIzaSyDW6G6WUl5JruCokwdJplyzS0QU5BLtxZ8',
  v: '3.24',                // Google Maps API version
  libraries: 'places',   // If you want to use places input
});
Vue.component('locationInput', require('./components/LocationInput.vue'));
const app = new Vue({
    el: 'body'
});