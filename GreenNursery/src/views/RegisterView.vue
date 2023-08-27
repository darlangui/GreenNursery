<script setup>
import LoginHeader from "@/components/LoginHeader.vue";
import Footer from "@/components/Footer.vue";
import CustomInput from '@/components/icons/Input.vue';
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