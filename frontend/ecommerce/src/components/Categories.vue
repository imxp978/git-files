<template>
  <section id="category">
    <div class="container px-5 text-center" py-5>
      <h3 class="my-5 movable slideIn">CATEGORIES</h3>
      <div class="row my-3">
        <div
          class="card col-sm-12 col-md-6 col-lg-4 border-0 gx-5 gy-5 movable slideIn"
          v-for="item in categories"
          :key="item.id"
        >
          <div class="card-image">
            <div class="card-modal" style="z-index: 1">
              <p>
                <RouterLink :to="{ name: 'category', params: { id: item.id }}">{{
                  item.title
                }}</RouterLink>
              </p>
            </div>
            <div class="category-image">
              <RouterLink :to="{ name: 'category', params: { id: item.id }}"
                ><img
                  :src="`/images/category_images/${item.image}`"
                  class="card-img-top"
                  alt="..."
              /></RouterLink>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ item.title }}</h5>
          </div>
        </div>
      </div>
    </div>
    <hr />
  </section>
</template>

<script setup>
import { useCategoryStore } from "@/stores/CategoryStore.js";

const categories = useCategoryStore().categories;
</script>

<style>
a {
  color: white;
  text-decoration: none;
}
a:hover {
  color: lightgray;
  text-decoration: none;
}
</style>
