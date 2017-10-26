<template>
	<div>
		<food v-for="food in foods" :food-data="food" :key="food.id"></food>

    <div id="food-form">
      <food-circle :endpoint="endpoint" @foodAdded="addFood($event)">
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
		},
		methods: {
			addFood(event) {
				console.log('adding: ');
				console.log(event);
				this.foods.push(event);
			}
		}
	}
</script>