<template>
  <div class="w-full flex">
    <div class="mx-auto w-9/12">
      <h2 class="heading-secondary">Search Posts for: "{{ input }}"</h2>
      <div class="grid grid-cols-3 gap-3">
        <card :post="post" v-for="post in posts.data" :key="post.id" />
      </div>
    </div>
  </div>
</template>

<script>
import card from "@/components/Post/Card";

export default {
  props: {
    posts: Object,
    input: String,
  },
  components: {
    card,
  },
};
</script>
