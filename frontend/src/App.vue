<template>
  <Navbar />
  <router-view />
</template>

<script>
import Navbar from './components/NavBar.vue'
import { computed } from '@vue/reactivity';

export default {
  name: 'App',
  components: {
    Navbar
  },
  data() {
    return {
      isLogin: false,
    };
  },
  methods: {
    setLogin(login) {
      this.isLogin = login
    },
  },
  provide() {
    return {
      isLogin: computed(() => this.isLogin),
      setLogin: this.setLogin

    }
  },
  mounted() {
    
      this.isLogin = !!localStorage.getItem('token');
  }
}

</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap');


*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

</style>
