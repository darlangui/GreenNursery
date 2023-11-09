<template>
  <header>
    <div class="container">
      <div class="logo">
        <h1 @click="goToHome">GreenNursery</h1>
      </div>
      <ul class="icons">
        <li class="shop">
          <img src="/icons/shop.svg" alt="Shop" />
          <span>0</span>
        </li>
        <template v-if="isLoggedIn">
          <li>
            <img @click="goToLogout" class="user" src="/icons/user.svg" alt="User" />
          </li>
        </template>
        <template v-else>
          <li>
            <img @click="goToLogin" class="user" src="/icons/log-in.svg" alt="User" />
          </li>
        </template>
      </ul>
    </div>
  </header>
</template>

<script setup>
  import { useRouter } from 'vue-router';
  import {ref} from "vue";

  const router = useRouter();
  const isLoggedIn = ref(localStorage.getItem('isLoggedIn') === 'true');

  const goToHome = () => {
    router.push('/');
  }

  const goToLogout = () => {
    localStorage.removeItem('isLoggedIn');
    localStorage.removeItem('accessToken')
    isLoggedIn.value = false;
    router.push('/login');
  }

  const goToLogin = () => {
    router.push('/login');
  }
</script>

<style scoped>
  @import url('../assets/colors.css');

  header {
    display: flex;
    justify-content: center;
    align-items: center;

    width: 100%;
    max-width: 100%;
    height: 80px;

    border-bottom: 1px solid var(--grayscale-200);
  }

  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;

    width: 100%;
    max-width: 1112px;
  }

  .logo h1 {
    color: var(--black);
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-style: normal;
    line-height: 120%;
  }

  .icons {
    display: flex;
    align-items: center;
    gap: 40px;
  }

  .icons li {
    position: relative;
    cursor: pointer;
  }

  .icons li img {
    width: 32px;
    height: 32px;
  }

  .icons li span {
    position: absolute;
    bottom: -4px;
    right: -4px;
    background-color: var(--black);
    color: var(--white);
    height: 16px;
    width: 16px;
    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: var(--white);
    text-align: center;
    font-size: 10px;
    line-height: 120%;
  }
</style>