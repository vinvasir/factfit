<template>
	<div>
		<food v-for="food in foods" :food-data="food"></food>

    <div id="food-form">
      <food-circle :endpoint="endpoint">
      </food-circle>
    </div>		
	</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			endpoint: {
				type: String,
				required: true
			}
		},
		data() {
			return {
				foods: []
			}
		},
		created() {
			axios.get(this.endpoint)
				 .then(({data}) => {
				 		this.foods = data.foods;
				 });
		}
	}
</script>