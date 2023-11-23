<script setup>
  import Header from "@/components/HeaderComponent.vue";
  import Footer from "@/components/FooterComponent.vue";
  import CartItem from "@/components/icons/CartItem.vue";
  import ButtonCustom from "@/components/icons/ButtonCustom.vue";
  import { useRouter } from 'vue-router';
  import { cartStore } from "../stores/cart";

  const router = useRouter();
  const store = cartStore();

  const goToHome = () => {
    router.push('/');
  }
</script>

<template>
  <Header/>
  <main>
    <div class="main">
      <section class="right">
        <a @click="goToHome" class="goback">
          <img src="/icons/arrowleft.svg" alt="Arrow Left"/>
          <span>Voltar para o início</span>
        </a>
        <h2>Sua lista de compras</h2>
        <div class="listCart" v-for="(product, id) in store.products" :key="id">
          <CartItem :id="product.id" :price="product.price" :name="product.name" :image="product.image">
            <template #image>
              <img :src="product.image" alt="imagem">
            </template>
            <template #name>{{ product.name }}</template>
            <template #mount>
              {{ store.getItemQuantity(product.id) }}
            </template>
            <template #value>{{ product.price }}</template>
          </CartItem>
        </div>
      </section>
      <section class="left">
        <div class="left-cart">
          <div class="itens">
            <span>Itens:</span>
            <span>{{ store.cartQuantity() }} itens</span>
          </div>
          <div class="total">
            <p>Total</p>
            <span>R$ {{ store.getTotalPrice() }}</span>
          </div>
          <ButtonCustom>
           <template #button>Ir para o Pagamento</template>
          </ButtonCustom>
        </div>
      </section>
    </div>
  </main>
  <Footer/>
</template>

<style scoped>
  main {
    width: 100%;
    height: 100%;

    display: flex;
    justify-content: center;
    align-items: center;
  }

  .main {
    width: 1112px;
    height: 100%;

    display: flex;
    justify-content: space-between;

    margin-top: 48px;
  }

  .right {
    width: 100%;
    height: 100%;
  }

  .right h2{
    font-size: 32px;
    margin-bottom: 40px;
  }

  .goback {
    height: 32px;
    max-width: 1112px;

    font-size: 16px;

    display: flex;
    align-items: center;

    cursor: pointer;

    gap: 10px;
    margin-bottom: 48px;
  }

  .goback img {
    max-width: 32px;
    max-height: 32px;
  }

  .image img {
    width: 152px;
    height: 152px;
    border-radius: 8px;
  }

  .listCart {
    width: 100%;
  }

  .left {
    width: 100%;
    height: 536px;

    display: flex;
    align-items: center;
    justify-content: end;
  }

  .left-cart {
    width: 248px;
    height: 155px;
  }

  .left .itens {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;
  }

  .left .itens span {
    font-size: 18px;
    font-weight: 500;
  }

  .left .total {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 32px;
  }

  .left .total p{
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 16px;
  }

  .left .total span {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 16px;
  }
</style>