<script setup>

import router from "@/router";

const goToHome = () => {
  router.push('/');
};

</script>

<template>
  <header>
    <h1 @click="goToHome">GreenNursery</h1>
  </header>
</template>

<style scoped>
  @import url('../assets/colors.css');

  header {
    width: 100%;
    height: 80px;

    display: flex;
    justify-content: center;
    align-items: center;

    background: var(--white);
    border-bottom: 1px solid var(--grayscale-200);
  }

  h1 {
    color: var(--black);
    font-size: 18px;
    line-height: 120%;
    cursor: pointer;
  }
</style>