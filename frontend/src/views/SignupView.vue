<template>
    <!-- <navBarVue /> -->
    <div>
        <signup />
    </div>
</template>

<script>
// @ is an alias to /src
import Signup from '@/components/Signup.vue'
import navBarVue from '@/components/NavBar.vue'

export default {
    name: 'SignupView',
    components: {
        Signup,
        navBarVue
    }
}
</script>
