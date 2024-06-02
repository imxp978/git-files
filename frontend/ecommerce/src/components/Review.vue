<template>
  <section id="review" style="width: 100%">
    <div class="container text-center mx-auto px-5 py-5">
      <h3 class="my-5 movable slideIn">REVIEWS</h3>
      <div class="row gy-10 gx-5">


        <swiper
          :modules="modules"
          :slides-per-view="5"
          :space-between="50"
          loop
          autoplay
          @swiper="onSwiper"
          @slideChange="onSlideChange"
        >

          <swiper-slide 
            v-for="item in reviews"
            :key="item.id">
            <div class="swiper-slide">
              <div class="card col-12 border-0 border-end border-bottom border-3">
                <div class="row g-5">
                  <div class="review col-md-12">
                    <div class="review-image" >
                      <img :src="`/images/user_images/${item.image}`" class="img-fluid rounded-start"
                        alt="..." />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="card-body text-start">
                      <h5 class="card-title">{{ item.title }}</h5>
                      <span v-for="i in item.rate">
                        <i class="fa-solid fa-star"></i>
                      </span>
                      <p class="card-text">{{ item.content }}</p>
                      <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </swiper-slide>
          <swiper-slide>Placeholder1</swiper-slide>
          <swiper-slide>Placeholder2</swiper-slide>
        </swiper>
      </div>
      <hr/>
    </div>
  </section>
</template>

<script setup>
import { useReviewStore } from "@/stores/ReviewStore.js";

const reviews = useReviewStore().reviews;

  // import Swiper core and required modules
  import { Autoplay, A11y } from 'swiper/modules';

  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';

  // Import Swiper styles
  import 'swiper/css';
  import 'swiper/css/navigation';
  import 'swiper/css/pagination';

  const modules= [Autoplay, A11y];
  const onSwiper = (swiper) => {
    // console.log(swiper);
  };

  const onSlideChange = () => {
    // console.log('slide change');
  };





</script>

<style></style>
