<script setup>

import Header from "@/components/Header.vue";
</script>

<template>
  <header>
    <h1>GreenNursery</h1>
  </header>
</template>

<style scoped>
  header{
    width: 100%;
    height: 80px;

    display: flex;
    justify-content: center;
    align-items: center;

    border-bottom: 1px solid #E1E3E5;
  }

  h1 {
    font-size: 18px;
    font-weight: bold;
  }
</style>