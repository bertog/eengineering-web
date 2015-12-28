<template>
	<div class="container">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Id</td>
						<td>Id. Unico</td>
						<td>Titolo</td>
						<td>Data Pubblicazione</td>
						<td></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<tr v-for="post in posts">
						<td>{{ post.id }}</td>
						<td>{{ post.slug }}</td>
						<td>{{ post.title }}</td>
						<td>{{ post.published | format_date }}</td>
						<td>
							<a href="/post/{{ post.slug }}/edit"
							   class="btn btn-primary"	
							   >
								<i class="fa fa-pencil"></i>
							</a>						
						</td>
						<td>
							<button @click="trashPost(post)"
									class="btn btn-danger"
									>
								<i class="fa fa-trash"></i>
							</button>
						</td>	
					</tr>
				</tbody>
			</table>	
		</div>
	</div>
	<!-- <pre>{{ $data | json }}</pre> -->
</template>

<script>
	export default {
		data() {
			return {
				posts: ''
			};
		},
		ready() {
			this.getPosts();
		},
		filters: {
			format_date(published) {
				return published.substr(0, 10);
			}
		},
		methods: {
			getPosts() {
				this.$http.get('/api/posts').then( (posts) => {
					this.posts = posts.data;	
				});
			},
			trashPost(post) {
				swal({
	                title: "Sei sicuro?",
	                text: "Stai per eliminare l'articolo! Se lo elimini non sarà più visualizzato!",
	                type: "warning",
	                showCancelButton: true,
	                closeOnConfirm: true,
            	}, () => {
            		this.$http.delete('/api/posts/' + post.slug).then( (response) => {
            			swal({
            				title: 'Fatto!',
            				text: response.data.message,
            				type: 'success',
            				showConfirmButton: false,
            				timer: 2000
            			});
            			this.posts.$remove(post);
            		}, (response) => {
            			alert('Rotto Tutto!');
            		});
            	});
			}
		}
	};
</script>