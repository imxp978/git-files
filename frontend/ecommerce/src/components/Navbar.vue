<template>
    <section id="navbar">
      <div class="container">
        <nav
          class="navbar navbar-expand-lg bg-light bg-sm-dark fixed-top mx-auto d-flex justify-content-start justify-content-sm-end"
        >
          <div class="container">
          <RouterLink class="navbar-brand" to="/"><h3>We Live, <br />We Eat, <br />We Grow</h3></RouterLink>
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
                  <a class="nav-link active" aria-current="page" href="#"
                    >Home</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
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
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>

                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
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
                    Categories 2
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>

                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
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
                    Categories 3
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>

                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </li>
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
                      :class="{active: search}"
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
                    <a class="nav-link" href="#" @click="searchShow"
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
                      ><i class="fa-solid fa-cart-shopping fa-4"></i
                    ></a>
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
import { ref } from 'vue';

const search = ref(false)

function searchShow() {
  search.value = !search.value;
}

</script>

<style>

</style>