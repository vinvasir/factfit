<template>
  <li @click="chooseFood">
  	<img :src="imagePath" :alt="foodData.name" />
  	<span class="tooltiptext">{{ description }}</span>
  </li>
</template>

<script type="text/javascript">
	export default {
		props: {
			foodData: {
				type: Object,
				required: true
			}
		},
		computed: {
			description() {
				return this.foodData.description ? this.foodData.description : this.foodData.name
			},
			imagePath() {
				return `/images/${this.foodData.imageName}`;
			}
		},
		methods: {
			chooseFood() {
				let sanitizedData = this.foodData;

				sanitizedData.description = this.description;
				
				this.$emit('choose', this.foodData);
			}
		}
	}
</script>