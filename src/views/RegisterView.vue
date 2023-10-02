<script setup>
import LoginHeader from "@/components/LoginHeader.vue";
import Footer from "@/components/FooterComponent.vue";
import CustomInput from "@/components/icons/InputComponent.vue";
import CustomButton from '@/components/icons/ButtonCustom.vue';
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import {registerClient} from "@/services/clientService";

const name = ref('');
const password = ref('');
const email = ref('');

const router = useRouter();
const isRequestPending = ref(false);

const registerUser = async () => {
  if (isRequestPending.value) {
    return;
  }

  isRequestPending.value = true;
  try {
    await registerClient(name.value, email.value, password.value);
    await router.push('/login');
  } catch (error) {
    console.error('Erro ao registrar cliente:', error);
  } finally {
    isRequestPending.value = false;
  }
};

const goToLoginPage = () => {
  router.push('/login');
};

const formData = {
  name,
  password,
  email,
  registerUser,
  goToLoginPage
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
            v-model="formData.name"
            type="text"
        />
        <CustomInput
            label="Email:"
            placeholder="Digite seu email"
            v-model="formData.email"
            type="email"
        />
        <CustomInput
            label="Senha:"
            placeholder="Digite sua senha"
            v-model="formData.password"
            type="password"
        />
        <CustomButton>
          <template #button>
            <span @click="formData.registerUser" :disabled="isRequestPending">Cadastrar</span>
          </template>
          <template #description>
            Já possui uma conta?
          </template>
          <template #bold><span @click="formData.goToLoginPage">Fazer Login</span></template>
        </CustomButton>
      </div>
    </div>
  </main>
  <Footer/>
</template>

<style scoped>
  main {
    width: 100%;
    height: calc(100vh - 80px - 102px);

    display: flex;
    justify-content: center;
    align-items: center;
  }

  .register {
    width: 100%;
    max-width: 344px;
  }

  h1 {
    color: var(--black);
    font-size: 32px;
    line-height: 120%;
  }

  .information{
    margin-top: 48px;
  }
</style>