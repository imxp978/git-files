import { defineStore } from "pinia";

export const useCartStore = defineStore("cart", {
  state: () => {
    return {
      cart: [],
      notice: false,
      itemAdded: false,
    };
  },

  getters: {
    sum: (state) => () => {
      let total = 0;
      state.cart.map((item) => {
        total += item.price * item.quantity;
      });
      return parseFloat(total).toFixed(2);
    },
  },

  actions: {
    addToCart(product, quantity) {
      if (product.quantity > 0) {
        let cartIndex = this.cart.findIndex((item) => item.id === product.id);
        if (cartIndex === -1) {
          this.cart.push({
            id: product.id,
            title: product.title,
            price: product.price,
            image: product.image,
            quantity: +quantity,
          });
        } else {
          this.cart[cartIndex].quantity = parseInt(
            this.cart[cartIndex].quantity
          );
          this.cart[cartIndex].quantity += parseInt(quantity);
        }
        this.itemAddedToCart();
      }
    },

    itemAddedToCart() {
      setTimeout(this.addedToCart, 200);
      setTimeout(this.addedToCart, 1000);
    },

    addedToCart() {
      this.notice = !this.notice;
      this.itemAdded = !this.itemAdded;
    },

    checkCart() {
      return this.cart.length === 0;
    },

    checkQuantity(item) {
      if (item.quantity === 0) {
        this.delItem(item);
      }
    },

    delItem(item) {
      let delIndex = this.cart.findIndex((cartItem) => cartItem.id === item.id);
      if (delIndex !== -1) {
        if (confirm("Remove this item?")) {
          this.cart.splice(delIndex, 1);
        }
      }
    },

    countItem() {
      return this.cart.reduce(
        (acc, item) => (acc += parseInt(item.quantity)),
        0
      );
    },
  },
});
