<template>
  <div class="w-full flex flex-row flex-wrap py-4">
    <div class="w-full sm:w-3/4">
      <h2 class="heading-secondary">
        Newest Posts
      </h2>
      <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-3">
        <card :post="post" v-for="post in posts.data" :key="post.id" />
      </div>
      <div class="flex justify-center mt-3">
        <pagination :links="posts.links" />
      </div>
    </div>
    <div class="w-full sm:w-1/4">
      <div class="px-3">
        <h2 class="heading-secondary">TOP Categories</h2>
        <category
          v-for="category in categories"
          :key="category.id"
          :category="category"
        />
      </div>
    </div>
  </div>
</template>

<script>
import card from "@/components/Post/Card";
import Layout from "@/Layouts/Layout.vue";
import Category from "@/Components/Post/Category.vue";
import Pagination from "@/Components/Pagination";

export default {
  props: {
    posts: Object,
    categories: Array,
  },
  components: {
    card,
    Category,
    Pagination,
  },
  layout: Layout,
};
</script>

<style lang="scss" scoped></style>
