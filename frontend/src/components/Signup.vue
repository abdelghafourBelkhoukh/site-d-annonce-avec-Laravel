<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <div class="main-content min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full p-6 rounded-lg border space-y-8 bg-gray-100">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign up to your account</h2>
    </div>
    <form class="mt-8 space-y-6 " @submit.prevent="signUp">
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div class="py-2">
          <label for="FullName" class="sr-only">Full Name</label>
          <input id="FullName" name="FullName" type="text" autocomplete="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Full Name" v-model="Register.name">
        </div>
        <!-- <div class="py-2">
          <label for="lastName" class="sr-only">Last Name</label>
          <input id="lastName" name="lastName" type="text" autocomplete="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Last Name">
        </div> -->
        <div class="py-2">
          <label for="email-address" class="sr-only">Email address</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" v-model="Register.email">
        </div>
        <!-- <div class="py-2">
          <label for="phone-number" class="sr-only">Phone Number</label>
          <input id="phone-number" name="number" type="number" autocomplete="number" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone Number">
        </div> -->
        <div class="py-2">
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" v-model="Register.password">
        </div>
        <div class="py-2">
          <label for="Password-Confirmation" class="sr-only">Password Confirmation</label>
          <input id="Password-Confirmation" name="Password-Confirmation" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password Confirmation" v-model="Register.password_confirmation">
        </div>
      </div>
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-slate-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-white group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Sign up
        </button>
      </div>
    </form>
  </div>
</div>
</template>

<script>

import axios from 'axios'
import swal from 'sweetalert';

export default {
    name: "Signup",
    components: {
    },
    data() {
        return {
            Register: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    methods: {
    async signUp(){
      let config = {
                headers: {
                  'Accept' : 'application/json',
                  'Content-Type': 'application/json'
                }
            };
      axios.post('http://127.0.0.1:8000/api/register', 
        this.Register,config)
      .then(res => {
        console.log(res)
      })
      .catch(err => {
        console.log(err)
      });
      swal("Register succesfully", "", "success");
      this.$router.push('/login')
    },
  }
};
</script>

<style scoped>

.main-content {
    background-image: url("https://i.stack.imgur.com/6Yn3K.png");
    height: 85vh;
}
</style>
