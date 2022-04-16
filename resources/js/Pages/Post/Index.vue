<template>
  <div>
    <div v-for="post in posts.data" :key="post.id">
      <h3>{{ post.title }}</h3>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    posts: Object,
  },
};
</script>

<style lang="scss" scoped></style>
