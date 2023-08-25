<script setup>
</script>

<template>
  <div class="card">
    <div class="image">
      <img src="/image/plant1.svg" alt="Plant Image"/>
    </div>
    <div class="description">
      <div class="name">
        <span>Integer vitae justo</span>
      </div>
      <div class="priceadd">
        <span>R$ 0,00</span>
        <img src="/icons/add-button.svg" alt="Additional">
      </div>
    </div>
  </div>
</template>

<style scoped>
  .card {
    width: 248px;
    height: 351px;
    margin-top: 64px;
  }

  .image {
    width: 100%;
    height: 271px;

    background-color: #F8F8FA;
    display: flex;
    justify-content: center;
    align-items: end;

    cursor: pointer;
  }

  .image img {
    max-width: 210px;
    max-height: 228px;
  }

  .description {
    width: 100%;
    height: 80px;
    margin-top: 16px;
  }

  .name {
    color: #475569;
    font-size: 16px;
    cursor: pointer;
  }

  .priceadd{
    display: flex;
    justify-content: space-between;
    margin-top: 9px;
  }

  .priceadd span{
    color: #030712;
    text-style: bold;
    font-size: 24px;
  }

  .priceadd img{
    max-width: 32px;
    max-height: 32px;
    cursor: pointer;
  }

  .priceadd img:active {
    transform: translateY(5px);
  }
</style>