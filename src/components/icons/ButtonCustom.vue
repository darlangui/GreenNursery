<script setup>
</script>

<template>
  <div class="container">
    <button class="custom-button primary" @click="$emit('click')">
      <slot name="button"></slot>
    </button>
    <div class="sign">
      <div class="desc">
        <slot name="description"></slot>
      </div>
      <div class="mark">
      <slot name="bold"></slot>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    gap: 32px;
  }
  .custom-button {
    margin-top: 48px;
  }

  .sign {
    display: flex;
  }

  .desc {
    font-size: 15px;
    color: #475569;
  }

  .mark {
    font-size: 15px;
    font-weight: 800;
    cursor: pointer;
    margin-left: 8px;
  }
</style>