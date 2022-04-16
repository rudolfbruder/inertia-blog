<template>
  <div class="max-w-sm rounded overflow-hidden shadow-lg">
    <!-- <img class="w-full" :src="post.image_path" alt="Sunset in the mountains" /> -->
    <div class="px-6 py-4">
      <div class="flex flex-col h-28 justify-between">
        <div class="font-bold text-xl mb-2">{{ post.title }}</div>
        <span
          class="inline-block bg-violet-600 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2"
          >{{ post.category.title }}</span
        >
      </div>
      <p class="text-gray-700 text-base">
        {{ post.summary }}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span
        v-for="tag in post.tags"
        :key="tag.id"
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
        >#{{ tag.title }}</span
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "post-card",
  props: {
    post: Object,
  },
};
</script>

<style lang="scss" scoped></style>
