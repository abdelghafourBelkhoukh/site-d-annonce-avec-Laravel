import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Announcements',
    component: () => import('../views/AnnouncementView.vue')
  },
  {
    path: '/Login',
    name: 'Login',
    component: () => import('../views/LoginView.vue')
  },
  {
    path: '/Signup',
    name: 'Signup',
    component: () => import('../views/SignupView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
