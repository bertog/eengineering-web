<style lang="stylus">
	td 
		vertical-align: middle !important
</style>

<template>
	<div class="container">
		<div class="col-md-12">
			<input type="text"
				   class="form-control"
				   v-model="search"
				   placeholder="Cerca ..."
				   >
			<!-- <nav>
			  <ul class="pagination">
			    <li>
			      <a href="#" 
					 @click.prevent="minusTen()"
			         >
			        <span>&laquo;</span>
			      </a>
			    </li>
			    <li>
			      <a href="#" 
					 @click.prevent="plusTen()"
			         >
			        <span>&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>	    -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Logo</th>
						<th>Descrizione</th>
						<th>Visibile?</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="brand in brands | filterBy search | orderBy 'visible' -1">
						<td>
							<img :src="'/images/brands/' + brand.logo" alt="">
						</td>
						<td>
							<input type="text"
								   class="form-control"
								   v-model="brand.alternate"
								   @keyup="updateBrand(brand) | debounce 800"
								   >
						</td>
						<td>
							<input type="checkbox"
								   v-model="brand.visible"
								   @change="updateBrand(brand)"	
								   >
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>	

<!-- 	<pre>{{ $data | json }}</pre> -->
</template>

<script>
	export default {
		data() {
			return {
				message: 'Io Sono il Brands Manager! Minkia!',
				brands: '',
				search: '',
				offset: 0
			}
		},
		ready() {
			this.getBrands();
		},
		methods: {
			getBrands() {
				this.$http.get('/api/brands').then( (brands) => {
					this.brands = brands.data;
				})
			},
			updateBrand(brand) {
				this.$http.put('/api/brands/' + brand.id, brand).then( (response) => {
					console.log(response.message);
				}); 	
			},
			plusTen() {
				if (this.offset == 0) {
					this.offset = 10
				} else {
					this.offset += 10;
				}
			},
			minusTen() {
				if (this.offset > 0) {
					this.offset -= 10;
				} 
			}
		}
	}
</script>