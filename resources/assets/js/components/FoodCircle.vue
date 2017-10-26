<template>
	<div>
    <ul class='circle-container'>
      <li>
      	<img src="/images/cruciferous-veggies1.jpg" alt="Cruciferous Veggies" />
      	<span class="tooltiptext">Cruciferous Veggies (e.g., Kale, Broccoli)</span>
      </li>
      <li>
      	<img src='/images/dark-leafy-greens.jpg' alt="Dark Leafy Greens" />
      	<span class="tooltiptext">Dark Leafy Greens</span>
      </li>
      <li>
      	<img src='/images/cashew-ice-cream.jpg' alt="Ice Cream" />
      	<span class="tooltiptext">Ice Cream</span>
      </li>
      <li>
      	<img src='/images/meat-substitute.jpg' alt="Meat Substitute" />
      	<span class="tooltiptext">Meat Substitutes</span>
      </li>
      <li>
      	<img src='/images/fruit.jpg' alt="Fruit" />
      	<span class="tooltiptext">Fruit</span>
      </li>
      <li>
      	<img src='/images/legumes.jpg' alt="Legumes" />
      	<span class="tooltiptext">Legumes</span>
      </li>
      <li>
      	<img src='/images/white-bread.jpg' alt="Refined Starch" />
      	<span class="tooltiptext">Refined Starch</span>
      </li>
      <li>
      	<img src='/images/whole-grains.jpg' alt="Whole Grains and other Starch" />
      	<span class="tooltiptext">Unprocessed Starch (e.g. Potatoes, Whole Grains)</span>
      </li>
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