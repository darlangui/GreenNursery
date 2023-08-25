<script setup>
</script>

<template>
  <button class="custom-button" @click="$emit('click')">
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
</template>

<style scoped>
  .custom-button {
    height: 56px;
    width: 100%;
    background-color: #030712;
    color: #FFFFFF;
    border: none;
    border-radius: 8px;
    cursor: pointer;

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 18px;
    font-weight: 500;

    margin-top: 48px;
  }

  .sign {
    height: 27px;
    width: 305px;

    margin-top: 32px;

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