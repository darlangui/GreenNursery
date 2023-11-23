<script setup>
import Header from "@/components/HeaderComponent.vue";
import Footer from "@/components/FooterComponent.vue";
import {onMounted, ref} from "vue";
import {fetchPlant} from "@/services/plantService";
import router from "@/router";
import { cartStore } from "../stores/cart";

const emits = defineEmits(['custom-click']);
const store = cartStore();

const props = defineProps({
  id: String,
});

const plant = ref({
  id: '',
  content: '',
  preco: '',
  imagem: '',
  desc: '',
});

onMounted(async () => {
  try {
    const fetchedPlant = await fetchPlant(props.id);
    if (fetchedPlant && fetchedPlant.data && fetchedPlant.data.id) {
      plant.value = {
        id: fetchedPlant.data.id.toString(),
        content: fetchedPlant.data.name,
        preco: fetchedPlant.data.value,
        imagem: "https://api.darlanguimaraes.com/public/api/v1/plants/" + fetchedPlant.data.path,
        desc: fetchedPlant.data.description,
      };
    } else {
      console.error('Plant data or ID is undefined');
    }
  } catch (e) {
    console.error('Failed to fetch plant data', e);
  }
});

const handleBuyNow = () => {
  emits('custom-click');
  store.products = []
  store.addToCart({
    id: plant.value.id,
    name: plant.value.content,
    price: plant.value.preco,
    image: plant.value.imagem,
  });
};

const handleAddToCart = () => {
  emits('custom-click');
  store.addToCart({
    id: plant.value.id,
    name: plant.value.content,
    price: plant.value.preco,
    image: plant.value.imagem,
  });
  router.push('/cart');
};

const handleButtonClickReturn = () => {
  router.push('/');
}

</script>
<template>
  <Header/>
  
  <main>
    <div class="main-container">
      <section class="information">
        <div class="goback" @click="handleButtonClickReturn">
          <img src="/icons/arrowleft.svg" alt="Arrow Left"/>
          <span>Voltar para o início</span>
        </div>

        <div class="panel">
          <section class="image">
            <img :src="plant.imagem" alt="Plant Image"/>
          </section>
          
          <section class="description">
            <h3>{{ plant.content }}</h3>
            <p>{{ plant.desc }}</p>
            <span>R$ {{ plant.preco }}</span>

            <button @click="handleAddToCart" class="secondary">Adicionar ao carrinho</button>
            <button @click="handleBuyNow" class="primary">Comprar agora</button>
          </section>
        </div>
      </section>
    </div>
  </main>

  <Footer/>
</template>

<style scoped>
  @import url('../assets/colors.css');

  main {
    width: 100%;
    min-height: calc(100vh - 80px - 102px);

    display: flex;
    justify-content: center;
    align-items: center;
  }

  main .main-container {
    width: 100%;
    max-width: 1112px;
    height: 100%;
    max-height: 772px;

    display: flex;
    flex-direction: column;
    align-items: center;

    margin-bottom: 132px;
  }

  .information {
    width: 100%;
    padding-top: 48px;
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

    color: var(--black);
    font-size: 18px;
    font-weight: 400;
    line-height: 150%;
  }
  .goback img {
    max-width: 32px;
    max-height: 32px;
  }

  .panel {
    display: flex;
  }

  .image {
    background-color: #F8F8FA;
    display: flex;
    justify-content: center;
    align-items: end;

    margin-right: 40px;
    border-radius: 8px;
    
    width: 632px;
    height: 691px;
  }

  .image img {
    width: 632px;
    height: 691px;
  }

  .description {
    width: 100%;
  }

  .description h3 {
    margin-bottom: 8px;
    font-size: 24px;
    font-weight: 500;

    color: var(--black);
    font-family: 'Lato', sans-serif;
    font-size: 24px;
    font-weight: 500;
    line-height: 120%;
  }

  .description p {
    margin-bottom: 24px;
    color: var(--grayscale-400);
    font-size: 16px;
    line-height: 150%;
  }

  .description span {
    margin-bottom: 64px;
    color: var(--black);
    font-size: 32px;
    font-weight: 500;
    line-height: 150%;
  }

  button.secondary {
    margin-top: 64px;
    margin-bottom: 24px;
  }
</style>>