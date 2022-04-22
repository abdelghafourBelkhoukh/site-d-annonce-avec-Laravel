<template>
  <div class=" flex justify-start ml-16 fixed">
    <button
      class="bg-gray-200 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l "
    @click="showing = 'PostOffers'"
    >
      Offers
    </button>
    <button
      class="bg-gray-200 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"
      @click="showing = 'PostRequests'"
    >
      Requests
    </button>
  </div>
  <div v-if="showing == null" class="firstImage">

  </div>
  <div v-if="showing == 'PostOffers'">
  <PostOffers />
  </div>
  <div v-if="showing == 'PostRequests'">
  <PostRequests />
  </div>
  

 
</template>
<script>
import PostOffers from './PostOffers.vue';
import PostRequests from './PostRequests.vue';




export default {
  name: "PostFilter",
  components: {
    PostOffers,
    PostRequests,
  },
  data(){
    return {
      showing : 'PostOffers',
    }
  },
  
};
</script>

<style>
.main-content {
    background-image: url(https://i.stack.imgur.com/6Yn3K.png);
    height: 100vh;
}
</style>