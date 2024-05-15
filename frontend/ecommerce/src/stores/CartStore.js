import { defineStore } from "pinia";

export const useCartStore = defineStore("cart", {
  state: () => {
    return { cart: [] };
  },

  getters: {
    sum: (state) => () => {
      let total = 0;
      state.cart.map((item) => {
        total += item.price * item.quantity;
      });
      return total;
    }
  },

  actions: {
    addToCart(product) {
      if (product.quantity > 0) {
        let cartIndex = this.cart.findIndex((item)=>item.id === product.id)
        if (cartIndex === -1) {
          this.cart.push({id: product.id, title: product.title, price: product.price, image: product.image, quantity: +(quantity.value) })
        } else {
          this.cart[cartIndex].quantity = parseInt(this.cart[cartIndex].quantity)
          this.cart[cartIndex].quantity += parseInt(quantity.value);
        } itemAddedToCart()
      } 
    },
    
    checkCart() {
      return this.cart.length === 0;
    },
    
    checkQuantity(item) {
      if (item.quantity === 0) {
        delItem(item);
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
    
  },
});
