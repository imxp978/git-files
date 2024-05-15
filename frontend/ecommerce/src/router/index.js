import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ProductView from "../views/ProductView.vue";


const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },

  {
     path: '/products',
     name: "products",
     component: () => import('@/views/ProductsView.vue')
  },

  {
    path: '/product/:id', 
    name: "product",
    component: () => import('@/views/ProductView.vue')
  },

  {
    path: '/category/:id', 
    name: "category",
    component: () => import('@/views/CategoryView.vue')
  },

]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  scrollBehavior(to, from, savedPosition) {
    if(savedPosition) {
      return savedPosition;
    } else {
      return {top:0};
    }
  },
  routes

});

export default router;
