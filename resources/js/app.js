/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
var $ = require('jquery');
window.Vue = require('vue');
import simpleParallax from 'simple-parallax-js';
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';
import Masonry from 'masonry-layout';
import jQueryBridget from 'jquery-bridget';
import imagesLoaded from 'imagesloaded';

jQueryBridget('masonry', Masonry, $);
jQueryBridget('imagesLoaded',imagesLoaded,$);


Vue.use(BootstrapVue)

// Import the styles directly. (Or you could add them via script tags.)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('slider-component', require('./components/Slider.vue').default);
Vue.component('find-owl-component', require('./components/FindAndOwl.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('category-component', require('./components/Category.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    methods:{
        simpleParallaxInit : function () {
            var image = document.getElementsByClassName('thumbnail');
            new simpleParallax(image);
        },
        initMasonry:function () {
            var container = document.querySelector('.grid');
            var msnry = new Masonry( container, {
                columnWidth: 1,
                itemSelector: '.grid-item',
                fitWidth: true
            });
        }
    },
    mounted()
    {
        this.initMasonry(),
      this.simpleParallaxInit()
    }
});

