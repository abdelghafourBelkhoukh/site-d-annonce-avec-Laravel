<template>
  <!-- <navBarVue /> -->
  <div>
    <login />
  </div>
</template>

<script>
// @ is an alias to /src
import login from '@/components/Login.vue'
import navBarVue from '@/components/NavBar.vue'

export default {
  name: 'LoginView',
  components: {
    login,
    navBarVue
  }
}
</script>
