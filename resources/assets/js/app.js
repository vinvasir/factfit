
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

Vue.component('Graph', require('./components/Graph.vue'));
Vue.component('user-notifications', require('./components/UserNotifications.vue'));
Vue.component('day', require('./components/Day.vue'));
Vue.component('food-circle', require('./components/FoodCircle.vue'));
Vue.component('food-choice', require('./components/FoodChoice.vue'));
Vue.component('food-list', require('./components/FoodList.vue'));
Vue.component('food', require('./components/Food.vue'));
Vue.component('recipe-search', require('./components/RecipeSearch.vue'));
Vue.component('recipe-detail', require('./components/RecipeDetail.vue'));

const eventHub = new Vue();
window.eventHub = eventHub;

window.app = new Vue({
    el: '#app'
});
