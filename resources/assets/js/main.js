var Vue = require('vue');
var swal = require('sweetalert');

var VueRouter = require('vue-router');

Vue.use(require('vue-resource'));
Vue.use(VueRouter);

var router = new VueRouter({
	hashbang: false,
	history: true
});

import HomePage from './pages/HomePage.vue'
import AboutPage from './pages/AboutPage.vue'
import ContactsPage from './pages/ContactsPage.vue'
import BrandsPage from './pages/BrandsPage.vue'

router.map({
	'/': {
		component: HomePage
	},
	'/about': {
		component: AboutPage
	},
	'/contacts': {
		component: ContactsPage
	},
	'/brands': {
		component: BrandsPage
	}
});

var App = Vue.extend({});

router.start(App, '#app');

