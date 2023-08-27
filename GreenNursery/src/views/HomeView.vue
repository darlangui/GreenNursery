<script setup>
  import Header from "@/components/Header.vue";
  import Footer from "@/components/Footer.vue";
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
      <section class="init">
        <div class="phrase">
          <h2>Plantas incríveis, lar renovado.</h2>
          <p>Transforme seu espaço em um paraíso verde com nossas belas mudas de plantas.</p>
          <span><img src="/icons/arrow.svg" alt="Arrow Down"/>Confira nosso catálogo</span>
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
    </main>
    <Footer />
</template>

<style scoped>
  main {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .init {
    width: 1440px;
    height: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 64px;
    margin-bottom: 154px;
  }

  .phrase {
    width: 568px;
    height: 364px;

    display: flex;
    flex-direction: column;

    align-items: center;
  }

  .phrase h2{
    width: 460px;
    margin-bottom: 24px;
    font-size: 42px;
  }

  .phrase p{
    width: 460px;
    color: #475569;
    margin-bottom: 80px;
    font-size: 20px;
  }

  .phrase span {
    width: 460px;
    height: 32px;
    display: flex;
    align-items: center;
    font-size: 24px
  }

  .phrase img{
    width: 32px;
    height: 32px;

    cursor: pointer;
  }

  .image {
    width: 568px;
    height: 530px;
  }

  .image image {
    width: 568px;
    height: 530px;
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