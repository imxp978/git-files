<template>
  <section id="navbar">
    <div class="container">
      <nav
        class="navbar navbar-expand-lg bg-light bg-sm-dark fixed-top mx-auto d-flex justify-content-start justify-content-sm-end"
      >
        <div class="container">
          <RouterLink class="navbar-brand" :to="{name: 'home'}"
            ><h3>We Live, <br />We Eat, <br />We Grow</h3></RouterLink
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse bg-light"
            id="navbarSupportedContent"
          >
            <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
              <li class="nav-item">
                <RouterLink class="nav-link active" aria-current="page" :to="{name: 'home'}">Home</RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink class="nav-link" :to="{ name: 'products' }">Products</RouterLink>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li v-for="item in categories">
                    <RouterLink class="dropdown-item" :to="{ name: 'category', params: { id: item.id }}">{{ item.title }}</RouterLink>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  About Us
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Company</a></li>
                  <li>
                    <a class="dropdown-item" href="#">Contact Us</a>
                  </li>
                  <li></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Links
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#">Terms and Conditions</a>
                  </li>
                  <li><a class="dropdown-item" href="#">Privacy</a></li>
                  <li><a class="dropdown-item" href="#">FAQ</a></li>
                </ul>
              </li>
            </ul>
            <div
              class="d-flex justify-content-lg-end justify-content-end text-end"
            >
              <ul class="navbar-nav mb-2">
                <!-- <div id="search" class="input-group mb-3 d-flex justify-content-end align-item-center" >
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                  </div> -->
                <li class="d-flex justify-content-end">
                  <form
                    id="search"
                    class="d-flex justify-content-end text-end"
                    :class="{ active: search }"
                    role="search"
                  >
                    <input
                      class="form-control me-2"
                      type="search"
                      placeholder="Search"
                      aria-label="Search"
                    />
                    <button class="btn btn-dark" type="submit">Search</button>
                  </form>
                  <a class="nav-link" href="#" @click.prevent="searchShow"
                    ><i class="fa-solid fa-magnifying-glass fa-4"></i
                  ></a>
                </li>
                <li class="d-flex justify-content-end">
                  <a
                    class="nav-link"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#login"
                    ><i class="fa-solid fa-user fa-4"></i
                  ></a>
                </li>
                <li class="d-flex justify-content-end">
                  <a
                    class="nav-link"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#cart"
                    ><span
                      ><i class="fa-solid fa-cart-shopping fa-4"></i
                      >
                      <Transition>
                        <span
                          class="position-absolute translate-middle badge rounded-pill bg-danger"
                          v-if="cartStore.countItem()>0"
                        >
                        {{ cartStore.countItem() }}
                        </span>
                      </Transition>
                    </span></a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <hr />
    </div>
  </section>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { useCategoryStore } from "@/stores/CategoryStore.js"
import { useCartStore } from "@/stores/CartStore.js"; 
import { storeToRefs} from "pinia";

const cartStore = useCartStore();
const categories = useCategoryStore().categories;
const cart = useCartStore().cart;

const search = ref(false);

function searchShow() {
  search.value = !search.value;
  console.log('cart.value: '+cart.value)
  console.log('cart: '+cart)
  console.log('storeToRefs: '+storeToRefs.cart)
}

// let itemNumber = ref(null);
// onMounted(()=>{
//   itemNumber.value = store.getItemNumber;
// });

// const itemNumber = computed(()=> {
//   console.log(store.getItemNumber)
//   return store.getItemNumber
// })

</script>

<style></style>
