import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ProductsView from "../views/ProductsView.vue";


const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  // {
  //   path: "/products",
  //   name: "products",
  //   component: () => import("../views/ProductsView.vue"),
  // },
  {
    path: '/products/:id', 
    component: () => import('@/views/ProductsView.vue')
  }
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
