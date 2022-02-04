<template>
  <div>
    <h1 v-if="loading">LOADING</h1>
    <div v-else-if="error">ERROR</div>
    <div v-else>
      <h1>Blog 1</h1>
      <BlogPosts :posts="posts"></BlogPosts>

      <!-- Paginate -->
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center my-5">
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              @click="prevPage()"
              aria-label="Previous"
            >
              <span aria-hidden="true">&laquo;</span>
              <span class="visually-hidden">Previous</span>
            </a>
          </li>
          <template v-for="page in meta.last_page">
            <li
              class="page-item"
              :class="page === meta.current_page ? 'active' : ''"
            >
              <a class="page-link" href="#" @click="goToPage(page)">{{
                page
              }}</a>
            </li>
          </template>

          <li class="page-item">
            <a class="page-link" href="#" @click="nextPage()" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="visually-hidden">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import BlogPosts from "../components/BlogPosts.vue";
export default {
  components: { BlogPosts },
  data() {
    return {
      loading: true,
      error: false,
      posts: null,
      meta: null,
      links: null,
    };
  },
  methods: {
    fetchData(page_link) {
      let api_link = "api/posts";
      if (page_link) {
        api_link = page_link;
      }
      axios
        .get(api_link)
        .then((r) => {
          this.posts = r.data.data;
          this.meta = r.data.meta;
          this.links = r.data.links;
          this.loading = false;
          //   console.log(this.meta.current_page);
        })
        .catch((e) => {
          console.error("Error:" + e);
          this.error = true;
        });
    },

    nextPage() {
      this.fetchData(this.links.next);
    },
    prevPage() {
      this.fetchData(this.links.prev);
    },
    goToPage(page_num) {
      console.log(page_num);
      this.fetchData("api/posts?page=" + page_num);
    },
  },

  mounted() {
    this.fetchData();
  },
};
</script>

<style>
</style>