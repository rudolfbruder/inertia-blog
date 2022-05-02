<template>
  <span
    class="inline-block bg-violet-600 hover:bg-violet-500 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2 cursor-pointer"
    @click="redirectToSearchByCategory"
    >{{ category.title }}</span
  >
</template>
<script>
import { Inertia } from "@inertiajs/inertia";

export default {
  props: {
    category: Object,
  },
  methods: {
    redirectToSearchByCategory() {
      Inertia.get("/posts/search-by-category-results/" + this.category.title);
    },
  },
};
</script>
