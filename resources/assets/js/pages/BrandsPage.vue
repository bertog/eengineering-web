<template>
	<div class="brands">
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