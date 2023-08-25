<script setup>
import LoginHeader from "@/components/LoginHeader.vue";
import Footer from "@/components/Footer.vue";
import CustomInput from '@/components/icons/Input.vue';
import CustomButton from '@/components/icons/ButtonCustom.vue';

import { ref } from 'vue';
const name = ref('');
const password = ref('');
const email = ref('');

const handleButtonClick = () => {
  console.log('Botão clicado!');
};
</script>

<template>
  <LoginHeader/>
  <main>
    <div class="register">
      <h1>Crie sua conta!</h1>
      <div class="information">
        <CustomInput
            label="Name:"
            placeholder="Digite seu nome"
            v-model="name"
            type="text"
        />
        <CustomInput
            label="Email:"
            placeholder="Digite seu email"
            v-model="email"
            type="email"
        />
        <CustomInput
            label="Senha:"
            placeholder="Digite sua senha"
            v-model="password"
            type="password"
        />
        <CustomButton @click="handleButtonClick">
          <template #button>
            Cadastrar
          </template>
          <template #description>
            Já possui uma conta?
          </template>
          <template #bold> Fazer Login</template>
        </CustomButton>
      </div>
    </div>
  </main>
  <Footer/>
</template>

<style scoped>
main{
  height: 830px;
  width: 100%;

  display: flex;
  justify-content: center;
  align-items: center;
}

.register {
  width: 344px;
  height: 441px;
}

h1 {
  font-size: 32px;
  font-weight: 500;
}

.information{
  margin-top: 48px;
}
</style>