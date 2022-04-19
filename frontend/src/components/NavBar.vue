<template>

  <nav class="sticky z-50 bg-white flex flex-wrap items-center justify-between top-0">
    <div class="container px-6 mx-auto flex flex-wrap items-center justify-between">
      <div class="w-full relative flex justify-between lg:w-40  px-4 lg:static lg:block lg:justify-start">
        <a class="text-sm font-bold leading-relaxed inline-block mr-4 pt-1 whitespace-nowrap uppercase text-white" href="#pablo">
            <img src="../assets/logo.png" alt="">
        </a>
        <button class="text-black cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" v-on:click="toggleNavbar()">
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <div v-bind:class="{'hidden': !showMenu, 'flex': showMenu}" class="lg:flex lg:flex-grow lg:justify-end items-center">
        <ul class="flex flex-col lg:flex-row list-none justify-center justify-around w-2/4">
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug text-black hover:bg-slate-100 hover:text-slate-900">
                <router-link to="/">Announcements</router-link>
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug text-black hover:bg-slate-100 hover:text-slate-900">
                <router-link to="/Signup">Sign up</router-link>
            </a>
          </li>
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs uppercase leading-snug text-black hover:bg-slate-100 hover:text-slate-900">
                <router-link to="/Login">Login</router-link>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import {VueScrollFixedNavbar} from "vue-scroll-fixed-navbar";

export default {
  name: "navBar",
  components: {
    VueScrollFixedNavbar
  },
  data() {
    return {
      showMenu: false
    }
  },
  methods: {
    toggleNavbar(){
      this.showMenu = !this.showMenu;
    }
  }
}
</script>
<style lang="scss" scoped>

a{
    font-size: 14px;
}


</style>