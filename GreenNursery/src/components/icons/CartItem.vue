<script setup>

</script>

<template>
  <div class="cart">
    <div class="image">
      <slot name="image"></slot>
    </div>
    <div class="information">
      <p><slot name="name"></slot></p>
      <div class="add">
        <img src="/icons/removeicon.svg" alt="Remove Icon">
        <span><slot name="mount"></slot> Unidade/s</span>
        <img src="/icons/addicon.svg" alt="Add Icon">
      </div>
      <span>R$ <slot name="value"></slot></span>
    </div>
  </div>
</template>

<style scoped>
  .cart {
    max-width: 536px;
    height: 152px;

    display: flex;

    margin-bottom: 32px;
  }

  .image {
    width: 152px;
    height: 152px;

    background-color: #F8F8FA;
    display: flex;
    justify-content: center;
    align-items: end;
  }

  .information{
    max-width: 360px;
    max-height: 125px;
    margin-left: 24px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .information p{
    color: #475569;
    font-size: 16px;
    margin-bottom: 16px;
  }

  .information span {
    font-size: 24px;
    color: #030712;
    font-weight: 500;
  }

  .information .add {
    width: 100%;
    height: 32px;
    display: flex;
    gap: 16px;
    align-items: center;

    margin-bottom: 24px;
  }

  .information .add span{
    font-size: 16px;
    color: #030712;
  }

  .information .add img {
    max-width: 32px;
    max-height: 32px;

    cursor: pointer;
  }
</style>