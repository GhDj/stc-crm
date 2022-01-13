import AllProspects from "./components/AllProspects";
import DataTableComponent from "./components/DataTableComponent";

require('./bootstrap');
window.Vue = require('vue');

/*import App from './components/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});*/

/*const app = new Vue({
    el: '#AllProspects',
    router: router,
    render: h => h(AllProspects),
});*/


Vue.component('datatable-component', require('./components/DataTableComponent.vue').default);
const app = new Vue({
    el: '#app',
});

$(document).ready(function () {
    $('#opportunite').click(function() {
        if($('#opportunite').is(':checked')) {
            $('#selectAgentOppo').removeClass('d-none');
            $('#selectAgentPj').addClass('d-none');
        }
    });

    $('#page_jaune').click(function() {
        if($('#page_jaune').is(':checked')) {
            $('#selectAgentPj').removeClass('d-none');
            $('#selectAgentOppo').addClass('d-none');
        }
    });

});
