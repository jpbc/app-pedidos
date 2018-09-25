
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

Vue.component('Categoria', require('./components/Categoria.vue'));
Vue.component('Articulo', require('./components/Articulo.vue'));
Vue.component('Cliente', require('./components/Cliente.vue'));
Vue.component('Proveedor', require('./components/Proveedor.vue'));
Vue.component('Rol', require('./components/Rol.vue'));
Vue.component('User', require('./components/User.vue'));
Vue.component('Ingreso', require('./components/Ingreso.vue'));
Vue.component('Venta', require('./components/Venta.vue'));
Vue.component('Dashboard', require('./components/Dashboard.vue'));
Vue.component('Consultai', require('./components/Consultai.vue'));
Vue.component('Consultav', require('./components/Consultav.vue'));
Vue.component('Notification', require('./components/Notification.vue'));

Vue.filter('toPesos', function (value) {
    return '$${value}';
});
const app = new Vue({
    el: '#app',
    data :{
        menu : 0,
		notifications: []
    },
    created() 
    {
        let me = this;
        axios.post('notification/get').then(function(response){
            //console.log(response.data);
            me.notifications=response.data;
        }).catch(function(error){
            console.log(error);
        });

        var userId = $('meta[name="userId"]').attr('content');

        Echo.private('App.User.' + userId).notification((notification) => {
            //console-log(notification);
            me.notifications.unshift(notification);
        });
    }
});
