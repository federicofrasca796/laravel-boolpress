<template>
  <div class="container">
    <div class="row">
      <div class="col-6 my-3" v-for="post in posts" :key="post.id">
        <div class="card">
          <div class="card-img-top w-100">
            <img width="100%" :src="post.cover" :alt="post.title" />
          </div>
          <div class="card-title px-4 pt-4">
            <h3>{{ post.title }}</h3>
          </div>

          <div class="card-body px-4">
            <p>{{ post.sub_title }}</p>
            <div class="text-end text-muted" v-if="post.category">
              Category: {{ post.category.name }}
            </div>
            <div class="text-end text-muted" v-if="post.tags">
              Tags:
              <span v-for="tags in post.tags" :key="tags.id"
                >{{ tags.name }} -
              </span>
            </div>
            <router-link :to="'/blog/' + post.id" class="btn btn-primary">
              See more...
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    posts: Array,
  },
  data() {
    return {
      //   posts: null,
    };
  },
  mounted() {},
};
</script>
