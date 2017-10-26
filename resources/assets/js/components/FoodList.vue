<template>
	<div>
		<food v-for="food in foods.data" :food-data="food"></food>
	</div>
</template>

<script type="text/javascript">
	export default {
		data() {
			return {
				foods: {
					data: []
				}
			}
		}
	}
</script>