<template>
	<ul class="pagination">
		<li v-if="pagination.prev_page_url">
			<a @click.prevent="load(pagination.prev_page_url)" :href="pagination.prev_page_url">
				&laquo; Previous
			</a>
		</li>

		<li v-if="pagination.next_page_url">
			<a @click.prevent="load(pagination.next_page_url)" :href="pagination.next_page_url">
				Next &raquo;
			</a>
		</li>
	</ul>
</template>

<script>
	export default {
		data() {
			return {
				pagination: []
			}
		},

		mounted() {
			this.$bus.$on('pagination', data => {
				this.pagination = data;
			});
		},

		methods: {
			load(url) {
				this.$bus.$emit('loadPagination', url);
			}
		}
	}
</script>