<template>
  <section id="modal">
    <div
      class="modal fade"
      id="login"
      aria-hidden="true"
      aria-labelledby="exampleModalToggleLabel"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Log In</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              Account:
              <input
                class="form-control m-1"
                type="text"
                value="test@example.com"
              />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-light"
              data-bs-target="#exampleModalToggle2"
              data-bs-toggle="modal"
              data-bs-dismiss="modal"
            >
              Sign Up
            </button>
            <button type="button" class="btn btn-dark">Log In</button>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="exampleModalToggle2"
      aria-hidden="true"
      aria-labelledby="exampleModalToggleLabel2"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              Username:
              <input class="form-control m-1" type="text" value="user01" />
              Email:
              <input
                class="form-control m-1"
                type="email"
                value="test@example.com"
              />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
              Re-enter Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-dark"
              data-bs-target="#exampleModalToggle"
              data-bs-toggle="modal"
              data-bs-dismiss="modal"
            >
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade modal-lg mt-5"
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
              <div class="col-6 text-center">item</div>
              <div class="col-2 text-end">price</div>
              <div class="col-2 text-end">quantity</div>
              <div class="col-2 text-end">subtotal</div>
            </div>
            <hr />
            <Transition>
              <div v-show="checkCart()" class="text-end">Cart is empty</div>
            </Transition>
            <ul>
              <li
                v-for="item in cart"
                class="row d-flex justify-content-end align-items-baseline"
              >
                <div class="col-6 text-start">
                  <img
                    :src="`../images/product_images/${item.image}`"
                    width="50px"
                  />{{ item.title }}
                </div>
                <div class="col-2 text-end">$: {{ item.price }}</div>
                <div class="col-2 text-end">
                  <input
                    type="number"
                    class="form-control"
                    min="0"
                    v-model="item.quantity"
                    @change="checkQuantity(item)"
                  />
                </div>
                <div class="col-2 text-end">
                  $: {{ (item.price * item.quantity).toFixed(2) }}
                </div>
              </li>
            </ul>
            <hr />
            <li class="col-12 text-end d-flex justify-content-end">
              <div>$: {{sum}}</div>
            </li>

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
import { useCartStore } from "@/stores/CartStore.js";

const cartstore = useCartStore();
const cart = useCartStore().cart;
// console.log(cartstore.sum);

const sum = computed(() => {
  let total = 0;
  cart.map((item) => {
    total += item.price * item.quantity;
  });
  return parseFloat(total).toFixed(2);
});

function checkCart() {
  return cart.length === 0;
}

function checkQuantity(item) {
  if (item.quantity === 0) {
    delItem(item);
  }
}

function delItem(item) {
  let delIndex = cart.findIndex((cartItem) => cartItem.id === item.id);
  if (delIndex !== -1) {
    if (confirm("Remove this item?")) {
      cart.splice(delIndex, 1);
    }
  }
}

</script>

<style></style>
