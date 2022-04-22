<template>
   <div v-if="showingUpdate">
<div class="contain bg-fixed">

</div>
<div id="large-modal" tabindex="-1" class="flex justify-center items-center overflow-y-auto overflow-x-hidden fixed  z-50 px-80 pt-36 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Update announcement
                </h3>
                <button @click="showingUpdate = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="py-2">
            <label for="Title" class="sr-only">Title</label>
            <input id="Title" name="Title" type="text" autocomplete="" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Title" v-model="announcement.title">
        </div>
        <div class="py-2">
            <label for="description" class="sr-only">description</label>
            <input id="description" name="description" type="text" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="description" v-model="announcement.description">
        </div>
        <div class="py-2">
            <label for="type" class="sr-only">type</label>
            <select v-model="announcement.type" name="type" id="type" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                <option value="" disabled selected>Choose type...</option>
                <option value="offer">offer</option>
                <option value="request">request</option>
            </select>
        </div>
        <div class="py-2">
            <label for="picture" class="sr-only">picture</label>
            <input id="picture" @change="handleChange()"  name="picture" type="file" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password Confirmation" >
        </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button @click="updateRequest(announcement.id)" data-modal-toggle="large-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                <button @click="showingUpdate = false" data-modal-toggle="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
            </div>
        </div>
</div>
  </div>
  </div>
  <div class="posts p-10" v-for="request in RequestAnnouncements" :key="request.id">
    <!-- post -->
    <div
      class="container my-10 mx-auto max-w-3xl bg-slate-200 rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl transform transition-all duration-500"
    >
      <div class="flex items-center justify-between px-4">
        <div class="flex justify-between items-center py-4">
          <img
            class="w-12 rounded-full"
            src="https://i.pinimg.com/originals/3c/b4/aa/3cb4aa4fa2c9293d31c4e9c3ecbccc33.png"
            alt="Alex"
          />
          <div class="ml-3">
            <h1 class="text-xl font-bold text-gray-800 cursor-pointer">
              {{request.name}}
            </h1>
            <p class="text-sm text-gray-800 hover:underline cursor-pointer">
              Created at {{request.created_at}}
            </p>
          </div>
        </div>
        <div @click="showing = !showing" v-if="logged && request.authorID == userID">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-7 w-7 cursor-pointer"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
            />
          </svg>
          <!-- Dropdown menu -->
          <div v-if="showing"
            id="dropdown"
            class="absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
          >
            <ul
              class="py-1 text-sm text-gray-700 dark:text-gray-200"
              aria-labelledby="dropdownDefault"
            >
              <li>
                <a
                  href="#" 
                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                  @click="getRequest(request.id)"
                  >Edit</a>
              </li>
              <li>
                <a
                  href="#"
                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                  @click="deleteRequest(request.id)">Delete</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <img :src="request.picture" alt="" />
      <div class="p-6">
        <h1 class="text-3xl font-bold text-gray-800 cursor-pointer">{{request.title}}</h1>
        <h2 class="text-xl text-gray-800 font-semibold">by {{request.name}}</h2>
        <p class="text-lg font font-extralight text-black">
          {{request.description}}
        </p>
      </div>
    </div>
  </div>
</template>
<script>

import axios from 'axios'

export default {
  name: "PostRequests",
  inject:['isLogin'],
  components: {},
  data(){
    return {
      showing: false,
      showingUpdate: false,
      RequestAnnouncements: [],
      announcement: '',
      logged : this.isLogin,
      userID: window.localStorage.getItem('id'),
      

    }
  },
  mounted(){
    this.getRequestAnnouncements()
  },
  methods: {
    getRequestAnnouncements : function(){
      axios.get('http://127.0.0.1:8000/api/announcements/search/request')
      .then(response => {
        this.RequestAnnouncements = response.data
      })
      .catch(err => {
        console.log(err)
      })
    },
    //get announecement by id for update
    getRequest : function(id){
      axios.get('http://127.0.0.1:8000/api/announcements/'+id)
      .then(response => {
        this.showingUpdate = true;
        this.announcement = response.data
        console.log(response)
      })
      .catch(err => {
        console.log(err)
      })
    },
    //update announcement
    updateRequest : function(id){
      console.log(this.announcement);
      console.log(id);
      const config = {
        headers: {
          'accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      }
      axios.put('http://127.0.0.1:8000/api/announcements/'+id, this.announcement, config)
      .then(response => {
        this.showingUpdate = false;
        this.getRequestAnnouncements();
        console.log(response)
      })
      .catch(err => {
        console.log(err)
      })
    },
    //delete announcement
    deleteRequest: function(id){
      const config = {
                headers: {
                    'accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            };
            console.log(id)
      axios.delete('http://127.0.0.1:8000/api/announcements/'+id, config)
      .then(response => {
        this.getRequestAnnouncements();
        console.log(response)
      })
      .catch(err => {
        console.log(err)
      })
    },
    handleChange:(e)=>{
            const files = e.target.files;
            console.log(this.announcement);
        this.announcement.picture = 'http://localhost:8080/images/'+files[0].name;
            console.log(this.announcement);
    },
  }
};
</script>
<style></style>
