<template>
  <form @submit.prevent="searchRecipeApi">
    <input type="text" v-model="recipeFullName">

    <select v-model="recipeWebsite">
      <option value="allrecipes">All Recipes</option>
      <option value="bbcgoodfood">BBC Good Foods</option>
      <option value="twopeasandtheirpod">Two Peas and Their Pod</option>
    </select>

    <button type="submit">Search</button>
  </form>
</template>

<script type="text/javascript">
  export default {
    data() {
      return {
        baseUrl: '/app/recipes-api',
        recipeWebsite: 'allrecipes',
        recipeFullName: '',
        recipeData: {}
      }
    },
    computed: {
      fullEndpoint() {
        return `${this.baseUrl}/${this.recipeWebsite}/${this.recipeSlug}`
      },
      recipeSlug() {
        return this.recipeFullName.split(" ").join("-").toLowerCase();
      }
    },
    methods: {
      searchRecipeApi() {
        console.log(`searching ${this.fullEndpoint}`);

        axios.get(this.fullEndpoint)
          .then(({data}) => {
            console.log(data.recipe);

            this.recipeData = data.recipe;

            window.eventHub.$emit('RECIPE_SELECTED', this.recipeData);
          })
      }
    }
  }
</script>