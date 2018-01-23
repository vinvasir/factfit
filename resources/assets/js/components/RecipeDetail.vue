<template>
  <div>
    <ul class="list-group">
      
      <li class="list-group-item" v-for="ing in recipe.ingredients">
        {{ ing }}
      </li>
    </ul>
  </div>
</template>

<script type="text/javascript">
  export default {
    created() {
      window.eventHub.$on('RECIPE_SELECTED', (recipeData) => {
        this.recipe = recipeData;
      })
    },
    data() {
      return {
        recipe: {}
      }
    }
  }
</script>