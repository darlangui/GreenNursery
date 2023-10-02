<script setup>
  import LoginHeader from "@/components/LoginHeader.vue";
  import Footer from "@/components/FooterComponent.vue";
  import CustomInput from '@/components/icons/InputComponent.vue';
  import CustomButton from '@/components/icons/ButtonCustom.vue';
  import {loginClient} from "@/services/clientService";

  import { ref } from 'vue';
  const password = ref('');
  const email = ref('');
  const showErrorMessage = ref(false);
  import { useRouter } from 'vue-router';

  const router = useRouter();

  const isRequestPending = ref(false);

  const handleLogin = async () => {
    if (isRequestPending.value) {
      return;
    }

    isRequestPending.value = true;

    try {
      await loginClient(email.value, password.value);
      console.log('Loginr bem-sucedido:');
      localStorage.setItem('isLoggedIn', 'true');
      await router.push('/');
    } catch (error) {
      console.error('Erro ao fazer login:', error);
      showErrorMessage.value = true;
    } finally {
      isRequestPending.value = false;
    }
  };

  const handleRegister = () => {
    router.push('/register');
  };

  const formData = {
    password,
    email,
    handleLogin,
    handleRegister
  };
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
          v-model="formData.email"
          type="email"
        />
        <CustomInput
          label="Senha:"
          placeholder="Digite sua senha"
          v-model="formData.password"
          type="password"
        />
        <span v-if="showErrorMessage" class="error-message">Email ou senha incorretos.</span>
        <CustomButton>
          <template #button >
            <span @click="formData.handleLogin" :disabled="isRequestPending">Entrar</span>
          </template>
          <template #description>
            Não possui uma conta?
          </template>
          <template #bold>
            <span @click="formData.handleRegister">
              Cadastrar-se</span>
          </template>
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

  .login {
    width: 100%;
    max-width: 344px;
  }

  h1 {
    color: var(--black);
    font-size: 32px;
    line-height: 120%;
  }

  .information {
    margin-top: 48px;
  }
</style>