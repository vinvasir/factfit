<template>
	<div>
    <ul class='circle-container'>
      <li><img src="/images/cruciferous-veggies1.jpg" alt="Cruciferous Veggies" /></li>
      <li><img src='/images/dark-leafy-greens.jpg' alt="Dark Leafy Greens" /></li>
      <li><img src='/images/cashew-ice-cream.jpg' alt="Ice Cream" /></li>
      <li><img src='/images/meat-substitute.jpg' alt="Meat Substitute" /></li>
      <li><img src='/images/fruit.jpg' alt="Fruit" /></li>
      <li><img src='/images/legumes.jpg' alt="Legumes" /></li>
      <li><img src='/images/white-bread.jpg' alt="Refined Starch" /></li>
      <li><img src='/images/whole-grains.jpg' alt="Whole Grains and other Starch" /></li>
    </ul>

    <input type="hidden" :value="selectedFood" />
  </div>
</template>

<script type="text/javascript">
	export default {
		data() {
			return {
				selectedFood: ''
			};
		}
	}
</script>