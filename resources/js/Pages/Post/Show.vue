<script setup>
import Category from "@/Components/Post/Category.vue";
defineProps({
  post: Object,
});
</script>
<template>
  <div
    class="max-w-5xl mx-auto rounded overflow-hidden shadow-lg bg-white px-9 py-7"
  >
    <div class="h-16">
      <h1 class="text-violet-600 text-2xl font-bold mb-2">{{ post.title }}</h1>
      <category :category="post.category" />
    </div>
    <div class="mt-5" v-html="post.content"></div>
  </div>
</template>
