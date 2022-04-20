<template>
  <!-- <NavBar /> -->
  <div class="main-content pt-10 z-0 bg-fixed">
  <AddPost />
  <PostFilter />
  
  </div>
</template>

<script>
// @ is an alias to /src
import NavBar from '@/components/NavBar.vue'

import AddPost from '@/components/AddPost.vue'
import PostFilter from '@/components/PostFilter.vue'


export default {
  name: 'AnnouncementView',
  components: {
    NavBar,
    AddPost,
    PostFilter
}
}
</script>


<style >
  .main-content {
  background-image: url("https://i.stack.imgur.com/6Yn3K.png");
  height: auto;
}
</style>