<template>
	<div class="splash">
		<img :src="'/images/splash/' + image + '-2048.jpg'" 
			 srcset="/images/splash/{{image}}-4096.jpg, 4096w, 
			 		 /images/splash/{{image}}-2048.jpg, 2048w, 
			 		 /images/splash/{{image}}-1024.jpg, 1024w" 
			 alt="Electronic Engineering"
			 >
		<h3>Una lunga storia di qualità</h3>
		<h1>Electronic Engineering</h1>	
		<h3>Centro Assistenza Tecnica per la Musica e lo Spettacolo</h3>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				image: '',
				fade: false
			}
		},
		ready() {
			this.randomImg();
			var rnd = setInterval(this.randomImg, 10000);
		},
		methods: {
			randomImg() {
				this.fade = false
				this.image = Math.floor((Math.random() * 15) + 1)
				this.fade = true
			}
		}
	}
</script>