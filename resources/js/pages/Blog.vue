<template>
  <div>
    <h1>Blog 1</h1>
    <BlogPosts :posts="posts"></BlogPosts>
  </div>
</template>

<script>
import BlogPosts from "../components/BlogPosts.vue";
export default {
  components: { BlogPosts },
  data() {
    return {
      loading: true,
      error: true,
      posts: null,
      meta: null,
      links: null,
    };
  },
  methods: {
    fetchApi() {
      axios
        .get("api/posts")
        .then((r) => {
          //   console.log(r);
          this.posts = r.data.data;
          this.loading = false;
        })
        .catch((e) => {
          console.error("Error:" + e);
          this.error = true;
        });
    },
  },
  mounted() {
    this.fetchApi();
  },
};
</script>

<style>
</style>