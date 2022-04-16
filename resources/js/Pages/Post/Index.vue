<template>
  <div class="w-full flex">
    <div class="w-9/12">
      <h2 class="mb-2">Newest Posts</h2>
      <div class="grid grid-cols-3 gap-3">
        <div v-for="post in posts.data" :key="post.id">
          <card :post="post" />
        </div>
      </div>
    </div>
    <div class="w-3/12">
      <div class="px-3">
        <h3 class="mb-2">TOP Categories</h3>
        <span
          v-for="category in categories"
          :key="category.id"
          class="inline-block bg-violet-600 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2"
          >{{ category.title }}</span
        >
      </div>
    </div>
  </div>
</template>

<script>
import card from "@/components/Post/Card";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Layout from "@/Layouts/Layout.vue";
export default {
  props: {
    posts: Object,
    categories: Array,
  },
  components: {
    card,
  },
  layout: Layout,
};
</script>

<style lang="scss" scoped></style>
