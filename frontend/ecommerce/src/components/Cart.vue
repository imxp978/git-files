<template>
  <section id="cart">
    <div>THIS IS CART LOADED</div>
    <div
      class="modal fade"
      id="cart"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row d-flex justify-content-end">
              <!-- <div class="col-2"></div> -->
              <div class="col-6 text-center">item</div>
              <div class="col-2 text-center">price</div>
              <div class="col-2 text-center">quantity</div>
              <div class="col-2 text-center">subtotal</div>
            </div>
            <hr />
            <div v-show="checkCartList()" class="text-end">Cart is empty</div>
            <ul>
              <li class="mb-1" v-for="(item, index) in cartList" :key="index">
                <div class="row d-flex justify-content-between">
                  <!-- <div class="col-1">
                  </div> -->
                  <div class="col-6 d-flex justify-content-start">
                    <img :src="item.image" width="50px" />
                    <p>{{ item.title }}</p>
                  </div>
                  <div class="col-2 d-flex justify-content-end ml-2">
                    <p>$:</p>
                    <p>{{ item.price }}</p>
                  </div>
                  <div class="col-2">
                    <input
                      type="number"
                      class="form-control"
                      value="1"
                      v-model="item.quantity"
                      @change="checkQuantity(item)"
                      min="0"
                    />
                  </div>
                  <div class="col-2 d-flex justify-content-end">
                    <p>$:</p>
                    <p>{{ (item.price * item.quantity).toFixed(2) }}</p>
                  </div>
                </div>
              </li>
            </ul>
            <hr />
            <div id="total" class="col-12 d-flex justify-content-end">
              <p>$:</p>
              <p>{{ sum }}</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-dark">Checkout</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from "vue";
import { usestore} from '@/stores/store.js'



const cartList = ref([
  {
    id: 1,
    title: "Rustic Iron Pot",
    price: 19.99,
    quantity: 1,
    image: "images/product_images/002.jpg",
  },
  {
    id: 2,
    title: "Ceramic Plate",
    price: 8.99,
    quantity: 2,
    image: "images/product_images/003.jpg",
  },
  {
    id: 3,
    title: "Modern Moka Coffee Maker",
    price: 39.99,
    quantity: 3,
    image: "images/product_images/004.jpg",
  },
]);

function checkCartList() {
  return cartList.value.length === 0;
}

function checkQuantity(item) {
  if (item.quantity === 0) {
    delItem(item);
  }
}

function delItem(item) {
  let delIndex = cartList.value.findIndex(
    (cartItem) => cartItem.id === item.id
  );
  if (delIndex !== -1) {
    if (confirm("Remove this item?")) {
      cartList.value.splice(delIndex, 1);
    }
  }
}

const sum = computed(() => {
  let total = 0;
  cartList.value.forEach((item) => {
    total += item.price * item.quantity;
  });
  return parseFloat(total).toFixed(2);
});
</script>

<style></style>
