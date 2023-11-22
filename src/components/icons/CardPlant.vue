<script setup>
import { useRouter } from 'vue-router';
import { cartStore } from "../../stores/cart";

const props = defineProps({
  id: String,
  name: String,
  image: String,
  price: Number,
});

const router = useRouter();
const store = cartStore();

const redirectToDescription = () => {
  router.push({ name: 'description', params: { id: props.id } });
};

const addToCart = () => {
  store.addToCart(props)
  console.log(props)
};
</script>

<template>
  <div class="card">
    <div class="image" @click="redirectToDescription">
      <img :src="image" alt="Plant Image"/>
    </div>
    <div class="description">
      <div class="name">
        <span @click="redirectToDescription"><slot name="nome"></slot></span>
      </div>
      <div class="priceadd">
        <span>R$ <slot name="preco"></slot></span>
        <img @click="addToCart" src="/icons/add-button.svg" alt="Additional">
      </div>
    </div>
  </div>
</template>

<style scoped>
  .card {
    width: 248px;
    margin-top: 64px;
  }

  .image {
    width: 100%;
    height: 271px;

    display: flex;
    justify-content: center;
    align-items: center;

    cursor: pointer;
  }

  .image img {
    max-width: 100%;
    max-height: 100%;
  }

  .description {
    width: 100%;
    height: 80px;
    margin-top: 16px;
  }

  .name {
    color: #475569;
    height: 39px;
    font-size: 16px;
    cursor: pointer;
  }

  .priceadd{
    display: flex;
    justify-content: space-between;
    margin-top: 9px;
  }

  .priceadd span{
    color: #030712;
    text-style: bold;
    font-size: 24px;
  }

  .priceadd img{
    max-width: 32px;
    max-height: 32px;
    cursor: pointer;
  }

  .priceadd img:active {
    transform: translateY(5px);
  }
</style>