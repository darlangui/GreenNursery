import { defineStore } from 'pinia'

export const cartStore = defineStore('cart', {
  state: () => ({
    products: []
  }),

  actions: {
    addToCart({ id, price, image, name }) {
      if (this.products.find((product) => product.id === id) == null) {
        this.products.push({ id, quantity: 1, price, image, name })
      } else {
        const newProducts = []

        this.products.map((product) => {
          if (product.id === id) {
            newProducts.push({ id, quantity: product.quantity + 1, price, image, name })
          } else {
            newProducts.push(product)
          }
        })

        this.products = newProducts
      }

      console.log(this.products)
    },

    getTotalPrice() {
      return this.products.reduce((total, cartItem) => {
        const item = this.products.find((i) => i.id === cartItem.id)
        return total + (item?.price || 0) * cartItem.quantity
      }, 0)
    },

    removeFromCart(id) {
      if (this.products.find((item) => item.id === id)?.quantity === 1) {
        this.products.map((item) => {
          if (item.id === id) {
            this.products.splice(item, 1)
          }
        })
      } else {
        this.products.map((item) => {
          if (item.id === id) {
            item.quantity--
          }
        })
      }
    },

    getItemQuantity(id) {
      return this.products.find((item) => item.id === id)?.quantity || 0
    },

    getItemTotalPrice(id) {
      const product = this.products.find((item) => item.id === id)
      return product.price * product.quantity
    },

    cartQuantity() {
      return this.products.reduce((quantity, item) => item.quantity + quantity, 0)
    }
  }
})
