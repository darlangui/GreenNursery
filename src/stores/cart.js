import { defineStore } from 'pinia'

export const cartStore = defineStore('cart', {
  state: () => ({
    products: []
  }),

  actions: {
    addToCart(id, quantity, price) {
      if (this.products.find((product) => product.id === id) == null) {
        return this.products.push({ id, quantity: 1, price })
      } else {
        return this.products.map((product) => {
          if (product.id === id) {
            return { ...product, quantity: product.quantity + 1 }
          } else {
            return product
          }
        })
      }
    }
  }
})
