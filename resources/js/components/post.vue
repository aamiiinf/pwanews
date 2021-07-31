<template>
<div>
<h1>id:{{ post.id }}</h1>
<hr>
<h1>نظرات</h1>
<div v-for="comment in comments" :key="comment.id">
  <h3>name:{{ comment.name }}</h3>
  <p>nazar:{{ comment.body }}</p>
  <p>nazar:{{ comment.post_id }}</p>
</div>
<form method="POST" v-on:submit="saveForm()">
  <input type="hidden" name="_token" v-bind:value="csrf">
  <div class="form-group">
    <label for="email">Email address:</label>
    <!-- <input v-if="user.role" type="email" class="form-control" placeholder="Enter email" id="email" v-model="user.email"> -->
    <input type="email" class="form-control" placeholder="Enter email" id="email" v-model="company.email">
  </div>
  <div class="form-group" v-if="!user.role">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd" v-model="company.password">
  </div>
  <div class="form-group">
    <textarea class="form-control" v-model="company.comment"></textarea>
  </div>
    <input type="hidden" v-model="company.post_id" >
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</template>
<script>
  export default {
    name: 'Post',
    data() {
      return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        post: {},
        comments: {},
        user: {},
        company: {
          email: '',
          password: '',
          comment: '',
          post_id: '',
        }
      }
    },
    created() {
      let uri = `/post/${this.$route.params.id}`;
      axios.post(uri).then((response) => {
      this.post = response.data.post;
      this.comments = response.data.comments;
      if(response.data.user){
        this.user = response.data.user;
      }
      });
    },
    methods: {
        saveForm(){
            event.preventDefault();
            var app = this;
            var newCompany = app.company;
            axios.post('/comment', newCompany).then(response => {
                console.log(response)
            }).catch(error => {
                alert(error)
            })
        },
    },
  }
</script>