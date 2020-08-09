/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';
import moment from 'moment';
import numeral from 'numeral';
import VueProgressBar from 'vue-progressbar';
import Swal from 'sweetalert2';

window.Form = Form;
window.Swal = Swal;

//Toast sweetalert
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: true
})

window.swalWithBootstrapButtons = swalWithBootstrapButtons;
window.Toast = Toast;



Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.use(VueProgressBar, {
  color:'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '5px'
})

//sima routes
let routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/users', component: require('./components/Users.vue').default },
  { path: '/profile', component: require('./components/Profile.vue').default },
  { path: '/developer', component: require('./components/Developer.vue').default },
  { path: '/listazo', component: require('./components/Listazo.vue').default },
  { path: '/kozep', component: require('./components/Kozep.vue').default },
  { path: '/arfolyam', component: require('./components/Arfolyam.vue').default },
]

//VUE ROUTES
const router = new VueRouter({
  //mode:'history',
  linkActiveClass: 'active',
  routes
})

//FILTERS
Vue.filter('upText',function(text){
  return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate',function(created){
  moment.locale('hu');
  return moment(created).format('LL')
})

Vue.filter("formatHUF", function (value) {
  return numeral(value).format("0,0"); // displaying other groupings/separators is possible, look at the docs
});
//FILTERS END

let Fire = new Vue();
window.Fire = Fire;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//PASSPORT
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('numeral',require('numeral')).default;
Vue.component('pagination',require('laravel-vue-pagination')).default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
