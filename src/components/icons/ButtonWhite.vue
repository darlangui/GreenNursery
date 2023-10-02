<script setup>
</script>

<template>
  <button class="custom-button secondary" @click="$emit('click')">
    <slot name="button"></slot>
  </button>
</template>

<style scoped>
.custom-button {
  height: 56px;
  width: 100%;
  background-color: #FFFFFF;
  color: #030712;
  border: 1px solid #030712;
  border-radius: 8px;
  cursor: pointer;

  display: flex;
  justify-content: center;
  align-items: center;

  font-size: 18px;
  font-weight: 500;
}
</style>