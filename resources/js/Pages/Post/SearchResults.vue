<template>
  <div>
    <h1 v-for="post in posts.data" :key="post.id">{{ post.title }}</h1>
  </div>
</template>

<script>
export default {
  props: {
    posts: Array,
  },
};
</script>
