var Vue = require('vue');
var swal = require('sweetalert');
var Dropzone = require('dropzone');

Vue.use(require('vue-resource'));

import post_manager from './components/post_manager.vue';
import brands_manager from './components/brands_manager.vue';
import post_archive from './components/post_archive.vue';

Vue.filter('formatDate', (value) => {
	var splitted_date = value.substr(0, 10).split('-')
	return splitted_date[2] + '/' + splitted_date[1] + '/' + splitted_date[0];
});

new Vue({
	el: '#dashboard',

	components: { 
		post_manager,
		post_archive,
		brands_manager 
	},

	ready() {

	},
})