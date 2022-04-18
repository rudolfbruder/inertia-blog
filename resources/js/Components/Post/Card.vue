<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Category from "@/Components/Post/Category.vue";

defineProps({
  post: Object,
});
</script>
<template>
  <Link
    :href="route('posts.show', { slug: post.slug })"
    as="div"
    class="max-w-sm rounded overflow-hidden shadow-lg hover:bg-slate-100 cursor-pointer"
  >
    <img class="w-full" :src="post.image_path" alt="Sunset in the mountains" />
    <div class="px-6 py-4">
      <div class="flex flex-col h-28 justify-between">
        <div class="font-bold text-xl mb-2">
          <h3>{{ post.title }}</h3>
        </div>
        <category :category="post.category" />
      </div>
      <p class="text-gray-700 text-base">
        {{ post.summary }}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span
        v-for="tag in post.tags"
        :key="tag.id"
        class="inline-block bg-gray-200 hover:bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 cursor-pointer"
        >#{{ tag.title }}</span
      >
    </div>
  </Link>
</template>
