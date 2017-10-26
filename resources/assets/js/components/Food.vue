<template>
  <div class="well">
    <h4>{{ foodData.name }}</h4>
    <h4>{{ typeName }}</h4>
    <p>{{ mealName }}</p>
    <p>{{ processed }}</p>
    <p>{{ foodData.description }}</p>
  </div>	
</template>

<script type="text/javascript">
	export default {
		props: {
			foodData: {
				type: Object,
				required: true
			},
			mealName: {
				type: String
			},
			typeName: {
				type: String
			}
		},
		computed: {
			processed() {
				return this.foodData.processed ? 'Processed food' : 'Whole food'
			}
		}
	}
</script>