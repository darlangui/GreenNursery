<script setup>
  import Header from "@/components/HeaderComponent.vue";
  import Footer from "@/components/FooterComponent.vue";
  import SelectableDiv from '@/components/icons/SelectableDiv.vue';
  import CardPlant from "@/components/icons/CardPlant.vue";
  import {computed, onMounted, ref} from 'vue';
  import {fetchAllCategory} from "@/services/categoryService";
  import {fetchAllPlant} from "@/services/plantService";

  const items = ref([]);
  const plantsItems = ref([]);
  const selectedCategoryId = ref(null);

  onMounted(async () => {
    try {
      const categories = await fetchAllCategory();
      items.value = [
        { content: 'Todas' },
        ...categories.map(category => ({
          content: category.nome,
          id: category.id,
        }))
      ];

      const plants = await fetchAllPlant();
      plantsItems.value = plants.map(plant => ({
        id: plant.id.toString(),
        content: plant.nome,
        preco: plant.preco,
        imagem: plant.imagem,
        desc: plant.desc,
        category_id: plant.category_id,
      }));
    } catch (e) {
      console.error('Failed to fetch data', e);
    }
  });

  const selectedItemIndex = ref(0);

  const selectItem = (index, categoryId) => {
    selectedItemIndex.value = index;
    selectedCategoryId.value = categoryId;
  };

  const filteredPlants = computed(() => {
    return plantsItems.value.filter(plantMatchesCategory);
  });

  const plantMatchesCategory = (plant) => {
    if (!selectedCategoryId.value || selectedCategoryId.value === 'Todas') {
      return true;
    } else {
      return plant.category_id === selectedCategoryId.value;
    }
  };
</script>

<template>
  <Header />

    <main>
      <div class="container">
        <section class="herobanner">
          <div class="text">
            <h2>Plantas incríveis, lar renovado.</h2>
            <p>Transforme seu espaço em um paraíso verde com nossas belas mudas de plantas.</p>

            <span>
              <img src="/icons/arrow.svg" alt="Arrow Down"/>
              Confira nosso catálogo
            </span>
          </div>
          
          <div class="image">
            <img src="/image/plant.svg" alt="Plant Image"/>
          </div>
        </section>

        <section class="product">
          <div class="product-pagination">
            <SelectableDiv
              v-for="(item, index) in items"
              :key="index"
              :is-selected="selectedItemIndex === index"
              @toggle-selection="selectItem(index, item.id)"
            >
              {{ item.content }}
            </SelectableDiv>
          </div>
          <div class="product-list">
            <div class="cards">
              <div v-for="(plant, index) in filteredPlants" :key="index">
                <CardPlant :imagem="plant.imagem" :id="plant.id">
                  <template #nome>
                    {{ plant.content }}
                  </template>
                  <template #preco>
                    {{ plant.preco }}
                  </template>
                </CardPlant>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  
  <Footer />
</template>

<style scoped>
  @import url('../assets/colors.css');

  main {
    width: 100%;
    max-width: 100%;
    min-height: calc(100vh - 80px - 102px);

    display: flex;
    align-items: center;
    flex-direction: column;
  }

  main .container {
    width: 100%;
    max-width: 1112px;

    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .herobanner {
    width: 100%;

    display: flex;
    justify-content: space-between;
    align-items: center;

    padding: 64px 0;
  }

  .herobanner .text {
    display: flex;
    flex-direction: column;
  }

  .herobanner .text h2 {
    color: var(--black);
    font-size: 48px;
    line-height: 120%;
    max-width: 411px;

    margin-bottom: 24px;
  }

  .herobanner .text p {
    color: var(--grayscale-400);
    font-size: 24px;
    line-height: 150%;
    max-width: 384px;

    margin-bottom: 80px;
  }

  .herobanner .text span {
    display: flex;
    align-items: center;
    gap: 8px;

    color: var(--black);
    font-family: 'Poppins', sans-serif;
    font-size: 24px;
    line-height: 150%;

    cursor: pointer;
  }
  .herobanner .text span:hover img {
    transform: translateY(4px);
  }

  .herobanner .text span img {
    width: 32px;
    height: 32px;

    transition: 0.3s ease-in;
  }

  .herobanner .image {
    margin-right: -61px;
  }

  .product{
    width: 1440px;
    height: 100%;
  }

  .product-pagination {
    width: 100%;
    height: 100%;

    display: flex;
    padding: 0 120px;
    flex-wrap: wrap;
  }

  .selectable-div {
    margin-right: 24px;
    margin-bottom: 10px;
  }

  .selectable-div:last-child {
    margin-right: 0;
  }

  .product-list{
    width: 100%;
    display: flex;
    justify-content: center;
  }

  .cards {
    width: 1152px;
    display: flex;
    gap:40px;
    flex-wrap: wrap;
  }

  @media (max-width: 1440px) {
    .init{
      width: 100%;
    }

    .product{
      width: 100%;
    }
  }
</style>