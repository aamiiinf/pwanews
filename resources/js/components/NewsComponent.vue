<template>
<div>
this is posts:
<div v-for="post in posts" :key="post.id">
{{ post.id }}
<router-link :to="{name: 'post', params: { id: post.id }}" class="btn btn-primary">more info</router-link>
</div>
</div>
</template>
<script>
  export default {
    name: 'NewsComponent',
    components: {
   
    },
    data() {
      return {
        posts: []
      }
    },
    created() {
      axios.post('/', {posts:this.posts}).then((response) => {
      this.posts = response.data;
      });
    },
    methods: {
    }
  }
</script>