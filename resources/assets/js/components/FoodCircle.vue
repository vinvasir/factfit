<template>
	<div>
    <ul class='circle-container'>

      <food-choice name="Cruciferous Veggies"
          image-name="cruciferous-veggies1.jpg"
          description="Cruciferous Veggies (e.g., Kale, Broccoli)">
      </food-choice>

      <food-choice name="Dark Leafy Greens" image-name="dark-leafy-greens.jpg"></food-choice>

      <food-choice name="Ice Cream" image-name="cashew-ice-cream.jpg"></food-choice>

      <food-choice name="Meat Substitute" image-name="meat-substitute.jpg"></food-choice>

      <food-choice name="fruit" image-name="fruit.jpg"></food-choice>

      <food-choice name="legumes" image-name="legumes.jpg"></food-choice>

      <food-choice name="Refined Starch" image-name="white-bread.jpg"></food-choice>

      <food-choice name="Unprocessed Starch" image-name="whole-grains.jpg"
          description="Unprocessed Starch (e.g. Potatoes, Whole Grains)">
      </food-choice>
    </ul>

    <form :action="endpoint">
    	<input type="hidden" :value="selectedFood" />
    </form>
    
  </div>
</template>

<script type="text/javascript">
	export default {
		props: {
			endpoint: {
				required: true,
				type: String
			}
		},
		data() {
			return {
				selectedFood: ''
			};
		}
	}
</script>

<style type="text/css">

img {
	/*z-index: 0;*/
}

/* Tooltip text */
.tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
 
    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
li:hover .tooltiptext {
    visibility: visible;
}
</style>