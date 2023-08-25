<script setup>
import LoginHeader from "@/components/LoginHeader.vue";
import Footer from "@/components/Footer.vue";
import CustomInput from '@/components/icons/Input.vue';

import { ref } from 'vue';
const password = ref('');
const email = ref('');
</script>

<template>
  <LoginHeader/>
  <main>
    <div class="login">
      <h1>Bem vindo!</h1>
      <div class="information">
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

  .login {
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