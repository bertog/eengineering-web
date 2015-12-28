var Vue = require('vue');
var swal = require('sweetalert');

Vue.use(require('vue-resource'));

import post_manager from './components/post_manager.vue';

new Vue({
	el: '#dashboard',

	components: { post_manager },

	ready() {

	}

})