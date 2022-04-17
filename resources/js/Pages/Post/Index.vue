<template>
  <div class="w-full flex">
    <div class="w-9/12">
      <h2 class="heading-secondary">
        Newest Posts
      </h2>
      <div class="grid grid-cols-3 gap-3">
        <card :post="post" v-for="post in posts.data" :key="post.id" />
      </div>
    </div>
    <div class="w-3/12">
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
export default {
  props: {
    posts: Object,
    categories: Array,
  },
  components: {
    card,
    Category,
  },
  layout: Layout,
};
</script>

<style lang="scss" scoped></style>
