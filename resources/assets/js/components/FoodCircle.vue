<template>
	<div>
    <ul class='circle-container'>

      <food-choice v-for="(choice, index) in foodChoices" :key="index"
          :food-data="choice"
          @choose="selectFood($event)">
      </food-choice>

      <li>

        <select v-model="meal">
          <option value="0">Breakfast</option>
          <option value="1">Lunch</option>
          <option value="2">Dinner</option>
          <option value="3">Snack</option>
        </select>

        <button v-if="selectedFood.name.length > 0" 
                class="btn btn-primary" 
                @click.prevent="submitFood"
          >
              {{ confirmation }}
        </button>      
      </li>
    </ul>

    <div>
      <a class="btn btn-danger" :href="endpoint + '/create'">OR Add a Custom Food</a>
    </div>
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
				selectedFood: {name: ''},
        meal: 3,
        foodChoices: [
          {
            name: 'Cruciferous Vegetables',
            imageName: 'cruciferous-veggies1.jpg',
            type_name: '',
            description: 'Cruciferous Veggies (e.g., Kale, Broccoli)',
            processed: false
          },
          {
            name: "Leafy Greens",
            imageName: "dark-leafy-greens.jpg",
            processed: false
          },
          {
            name: "Ice Cream",
            imageName: "cashew-ice-cream.jpg",
            processed: true
          },
          {
            name: "Meat Substitutes",
            imageName: "meat-substitute.jpg",
            processed: true
          },
          {
            name: 'Fruits',
            imageName: 'fruit.jpg',
            processed: false
          },
          {
            name: 'Legumes',
            imageName: 'legumes.jpg',
            processed: false
          },
          {
            name: 'Refined Grains',
            imageName: 'white-bread.jpg',
            processed: true
          },
          {
            name: "Whole Grains",
            imageName: "whole-grains.jpg",
            description: "Unprocessed Starch (e.g. Potatoes, Whole Grains)",
            processed: false
          }
        ]
			};
		},
    methods: {
      selectFood(event) {
        console.log(event);
        this.selectedFood = event;
      },
      submitFood() {
        axios.post(this.endpoint, {
          name: this.selectedFood.name,
          type_name: this.selectedFood.name,
          description: this.selectedFood.description,
          processed: this.selectedFood.processed,
          meal: this.meal
        }).then(({data}) => {
          this.$emit('foodAdded', data);
        })
      }
    },
    computed: {
      confirmation() {
        return `Add ${this.selectedFood.name}`
      }
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