var Vue = require('vue');
var swal = require('sweetalert');
var Dropzone = require('dropzone');

Vue.use(require('vue-resource'));

import post_manager from './components/post_manager.vue';
import brands_manager from './components/brands_manager.vue';

new Vue({
	el: '#dashboard',

	components: { 
		post_manager,
		brands_manager 
	},

	ready() {

	}

})