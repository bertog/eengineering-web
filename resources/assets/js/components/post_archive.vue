<template>
	<div class="container">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id.Univoco</th>
						<th>Titolo</th>
						<th>Pubblicato il:</th>
						<th>Rimosso il:</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="post in archive">
						<td>{{ post.slug }}</td>
						<td>{{ post.title }}</td>
						<td>{{ post.published | formatDate }}</td>
						<td>{{ post.deleted_at | formatDate }}</td>
						<td>
							<button class="btn btn-primary"
							        @click="restore(post)"
							        >
							        Recupera
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				message: 'Hei! Sono il Post Archive',
				archive: ''
			}
		},
		ready() {
			this.getArchive();
		},
		methods: {
			getArchive() {
				this.$http.get('/api/posts/archive').then( (archive) => {
					this.archive = archive.data;
				})
			},
			restore(post) {
				swal({
	                title: "Sei sicuro?",
	                text: "Vuoi davvero far tornare questo Articolo visibile",
	                type: "warning",
	                showCancelButton: true,
	                closeOnConfirm: true,
            	}, () => {
            		this.$http.put('/api/posts/' + post.id + '/restore').then( (response) => {
            			swal({
            				title: 'Fatto!',
            				text: response.data.message,
            				type: 'success',
            				showConfirmButton: false,
            				timer: 2000
            			});
            			this.archive.$remove(post);
            		}, (response) => {
            			alert('Rotto Tutto!');
            		});
            	});
			}
		}
	}
</script>