<script setup>
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";
import CustomInput from "@/components/icons/Input.vue";
import ButtonCustom from "@/components/icons/ButtonCustom.vue";
import PaymedItem from "@/components/icons/PaymedItem.vue";

import { ref } from 'vue';
const name = ref('');
const email = ref('');
const cpf = ref('');
const bairro = ref('');
const cep = ref('');
const cidade = ref('');
const rua = ref('');
const numero = ref('');

const items = ref([
  { content: 'Cartão de crédito' },
  { content: 'Cartão de débito' },
  { content: 'Pix' },
  { content: 'Boleto bancário' },
]);

const selectedItemIndex = ref(0);

const selectItem = (index) => {
  selectedItemIndex.value = index;
};
</script>

<template>
  <Header/>
  <main>
    <section class="main">
      <div class="goback">
        <img src="/icons/arrowleft.svg" alt="Arrow Left"/> <span>Voltar para o início</span>
      </div>
      <div class="cards">
        <div class="card">
          <h1>Dados pessoais</h1>
          <CustomInput
              label="Nome completo"
              placeholder="Nome completo"
              v-model="name"
              type="text"
          />
          <CustomInput
              label="Email"
              placeholder="email@email.com"
              v-model="email"
              type="text"
          />
          <CustomInput
              label="CPF"
              placeholder="000.000.000-00"
              v-model="cpf"
              type="text"
          />
        </div>
        <div class="card">
          <h1>Endereço de envio</h1>
          <CustomInput
              label="CEP"
              placeholder="00000-00"
              v-model="cep"
              type="text"
          />
          <CustomInput
              label="Cidade"
              placeholder="Cidade"
              v-model="cidade"
              type="text"
          />
          <CustomInput
              label="Rua ou logradouro"
              placeholder="Rua ou logradouro"
              v-model="rua"
              type="text"
          />
          <CustomInput
              label="Número"
              placeholder="Número"
              v-model="numero"
              type="text"
          />
          <CustomInput
              label="Bairro"
              placeholder="Bairro"
              v-model="bairro"
              type="text"
          />
        </div>
        <div class="card">
          <h1>Forma de pagamento</h1>
          <PaymedItem
              v-for="(item, index) in items"
              :key="index"
              :is-selected="selectedItemIndex === index"
              @toggle-selection="selectItem(index)"
          >
            {{ item.content }}
          </PaymedItem>
          <div class="total">
            <p>Subtotal</p><h1>R$ 0,00</h1>
          </div>
          <div class="total">
            <p>Frete:</p><h1>R$ 0,00</h1>
          </div>
          <div class="row"></div>
          <div class="totaled">
            <p>Total:</p><h1>R$ 0,00</h1>
          </div>
          <ButtonCustom>
            <template #button>Confirmar</template>
          </ButtonCustom>
        </div>
      </div>
    </section>
  </main>
  <Footer/>
</template>

<style scoped>
  main {
    width: 100%;
    height: 680px;

    display: flex;
    flex-direction: column;
    align-items: center;

    margin-bottom: 132px;
  }

  .main {
    margin-top: 50px;
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

  .cards {
    display: flex;
    gap: 40px;
  }

  .card{
    width: 344px;
    height: 599px;

    background-color: #FFFFFF;
    border: 1px solid #E1E3E5;
    border-radius: 8px;

    padding: 24px;
  }

  .card h1 {
    margin-bottom: 24px;
  }

  .row {
    width: 100%;
    height: 1px;
    margin-bottom: 16px;
    margin-top: 16px;
    background-color: #E1E3E5;
  }

  .total {
    margin-top: 16px;
    width: 100%;
    height: 22px;
    display: flex;
    justify-content: space-between;
  }

  .total h1{
    font-size: 18px;
    font-weight: 500;
  }

  .total span {
    font-size: 18px;
    font-weight: 200;
  }

  .totaled {
    width: 100%;
    height: 22px;
    display: flex;
    justify-content: space-between;
  }

  .totaled h1{
    font-size: 24px;
    font-weight: 500;
  }

  .totaled span {
    font-size: 18px;
    font-weight: 200;
  }

</style>