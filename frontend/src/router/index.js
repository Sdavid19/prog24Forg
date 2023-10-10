import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProfileView from '../views/ProfileView.vue'
import LoginView from '../views/auth/LoginView.vue'
import SignupView from '../views/auth/SignupView.vue'
import FoodListView from '../views/FoodListView.vue'
import CreateFoodView from '../views/CreateFoodView.vue'
import MultipleSignUpView from '../views/auth/MultipleSignUpView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/profile',
      name: 'profile',
      component: ProfileView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/signup',
      name: 'signup',
      component: SignupView
    },
    {
      path: '/foods',
      name: 'food',
      component: FoodListView
    },
    {

      path: '/create-food',
      name: 'create-food',
      component: CreateFoodView
    },
    {
      path: '/read-file',
      name: 'read-file',
      component: MultipleSignUpView
    }
  ]
})

export default router
