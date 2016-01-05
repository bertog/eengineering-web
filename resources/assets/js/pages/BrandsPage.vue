<template>
	<div class="brands">
		<h1>assistenza</h1>
		<h3>Questo è un elenco dei marchi su cui forniamo assistenza. Non sono gli unici. Nel caso non troviate il vostro <a href="mailto:info@electronic-engineering.com">contattateci</a></h3>
		<div class="grid">
			<div class="grid__row">
				<ul>
					<li v-for="brand in brands">
						<img :src="'/images/brands/' + brand.logo" 
							 alt="{{ brand.alternate }}"
							 title="{{ brand.alternate }}"
							 >
					</li>
				</ul>	
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				brands: ''
			}
		},
		ready() {
			this.getVisibleBrands()
		},
		methods: {
			getVisibleBrands() {
				this.$http.get('/api/brands/visible').then( (brands) =>{
					this.brands = brands.data;
				});
			}
		}
	}
</script>