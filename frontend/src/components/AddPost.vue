
<template>
    <div class="addPost  flex justify-end pr-8 mr-10 " v-if="isLogged">
        <button @click="showing = true;" type="button" class="fixed inline-block px-6 py-2.5 bg-slate-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Add Announcement
        </button>
    </div>

<div v-if="showing">
<div class="contain bg-fixed">

</div>
<div id="large-modal" tabindex="-1" class="flex justify-center items-center overflow-y-auto overflow-x-hidden fixed  z-50 px-80 pt-36 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Create new announcement
                </h3>
                <button @click="showing = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="py-2">
            <label for="Title" class="sr-only">Title</label>
            <input id="Title" name="Title" type="text" autocomplete="" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Title" v-model="announcemenet.title">
        </div>
        <div class="py-2">
            <label for="description" class="sr-only">description</label>
            <input id="description" name="description" type="text" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="description" v-model="announcemenet.description">
        </div>
        <div class="py-2">
            <label for="type" class="sr-only">type</label>
            <select name="type" id="type" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                <option value="" selected>Choose type...</option>
                <option value="offer">offer</option>
                <option value="request">request</option>
            </select>
        </div>
        <div class="py-2">
            <label for="picture" class="sr-only">picture</label>
            <input id="picture" name="picture" type="file" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password Confirmation" @change="announcemenet.picture">
        </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button @click="addAnnouncement" data-modal-toggle="large-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button @click="showing = false" data-modal-toggle="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
            </div>
        </div>
</div>
  </div>
  </div>


</template>

<script>

import axios from "axios";

export default {
    inject:['isLogin'],
    name: "AddPost",
    components: {
    },

    data() {
        return {        
            showing: false,
            announcemenet: {
                authorID: localStorage.getItem("id"),
                title: '',
                description: '',
                picture: 'https://i.stack.imgur.com/6Yn3K.png',
                type: 'offer',
            },
            isLogged:this.isLogin,
        }
    },
    methods: {
        addAnnouncement() {
            // console.log(this.announcemenet);
            const config = {
                headers: {
                    'accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            };
            axios.post('http://localhost:8000/api/announcements', this.announcemenet, config)
            .then(response => {
                console.log(response);
                this.showing = false;
            })
            .catch(error => {
                console.log(error);
            });
        },
    }
};
</script>

<style>
.contain{
    background: black;
    opacity: 0.5;
    width: 100%;
    height: 87vh;
    top: 107px;
    left: 0;
    z-index: 49;
    position: fixed;
}

</style>
