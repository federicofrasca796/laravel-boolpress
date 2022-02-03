<template>
  <div>
    <div v-if="loading">🕐 Loading</div>
    <div v-else-if="error">‼Error, try another record‼</div>
    <div v-else>
      <img :src="post.cover" alt="" width="50%" />
      <h1>{{ post.title }}</h1>
      <span class="text-muted"
        ><b>slug:</b><i>{{ post.slug }}</i></span
      >

      <div>
        <b>Category:</b>{{ post.category ? post.category.name : "none" }}
      </div>
      <div>
        <b>Tags:</b>
        <template v-if="post.tags">
          <template v-for="tag in post.tags"> {{ tag.name }} | </template>
        </template>
      </div>
      <h2>{{ post.sub_title }}</h2>
      <p>{{ post.body }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      error: false,
      post: {},
    };
  },
  mounted() {
    // console.log(this.$route.params.id);
    axios
      .get("/api/posts/" + this.$route.params.id)
      .then((r) => {
        // console.log(r.data);
        this.post = r.data;
        this.loading = false;
      })
      .catch((e) => {
        console.error(e);
        this.error = true;
      });
  },
};
</script>

<style>
</style>