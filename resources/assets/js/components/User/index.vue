<template>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Email Address</th>
				<th>Crated</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			<tr v-for="(user, index) in users.data">
				<td>{{ users.from + index }}</td>
				<td>{{ user.email }}</td>
				<td>{{ user.created_at }}</td>
				<td>#</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
	export default {
		data() {
			return {
				users: []
			}
		},

		mounted() {
			const url = '/user/paginate';

			this.getUser(url);

			// listen when search
			this.$bus.$on('search', keyword => {
				let params = {
					keyword: keyword
				}

				this.getUser(url, params);
			});

			// listen when pagination clicked
			this.$bus.$on('loadPagination', url => {
				this.getUser(url);
			});
		},

		methods: {
			getUser(url, params = null) {
				axios.get(url, {params}).then(response => {
					this.users = response.data;

					this.$bus.$emit('pagination', this.users);
				})
			}
		}
	}
</script>