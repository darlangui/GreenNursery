import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import LoginView from "@/views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";
import DescriptionView from "@/views/DescriptionView.vue";
import CartView from "@/views/CartView.vue";
import CheckoutView from "@/views/CheckoutView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      props: true
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/description:id',
      name: 'description',
      component: DescriptionView,
      props: true
    },
    {
      path: '/cart',
      name: 'cart',
      component: CartView,
      props: true
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: CheckoutView,
      props: true
    },
  ]
})

export default router;
