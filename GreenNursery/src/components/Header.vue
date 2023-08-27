<template>
  <header>
    <div class="logo">
      <h1 @click="handleButtonClick">GreenNursery</h1>
    </div>
    <div class="menu">
      <template v-if="isLoggedIn">
        <img src="/icons/shop.svg" alt="Shop Icon" />
        <img @click="logoutModal" class="user" src="/icons/user.svg" alt="Cart User" />
      </template>
      <template v-else>
        <button class="showLoginModal" @click="showLoginModal">Entrar</button>
      </template>
    </div>
  </header>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();
const isLoggedIn = localStorage.getItem('isLoggedIn');

const handleButtonClick = () => {
  router.push('/');
}

const logoutModal = () => {
  localStorage.removeItem('isLoggedIn');
  router.push('/login');
}
const showLoginModal = () => {
  router.push('/login');
}
</script>

<style scoped>
  header {
    width: 100%;
    height: 80px;
    background-color: #FFFFFF;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 0 100px;

    border-bottom: 1px solid #E1E3E5;
  }

  .logo {
    font-size: 12px;
    font-weight: bold;

    cursor: pointer;
  }

  .menu {
    height: 58px;
    width: 130px;

    display: flex;
    align-items: center;
  }

  .menu img{
    width: 42px;
    height: 42px;
    margin: 10px;
    cursor: pointer;
  }

  .showLoginModal {
    width: 80px;
    height: 42px;
    border: 1px solid #E1E3E5;
    border-radius: 8px;
    padding: 10px;
    background-color: transparent;
    cursor: pointer;
    margin-left: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

</style>