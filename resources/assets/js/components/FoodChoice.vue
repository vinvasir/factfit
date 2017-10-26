<template>
  <li>
  	<img :src="imagePath" :alt="name" />
  	<span class="tooltiptext">{{ finalDescription }}</span>
  </li>
</template>

<script type="text/javascript">
	export default {
		props: {
			name: {
				type: String,
				required: true
			},
			imagePath: {
				type: String,
				required: true
			},
			description: {
				type: String
			}
		},
		computed: {
			finalDescription() {
				return this.description ? this.description : this.name
			}
		}
	}
</script>