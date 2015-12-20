var Vue = require('vue');

var VueRouter = require('vue-router');

Vue.use(VueRouter);

var router = new VueRouter();

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

