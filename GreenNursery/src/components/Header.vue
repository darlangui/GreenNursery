<script setup>
</script>

<template>
  <header>
      <div class="logo">
        <h1>GreenNursery</h1>
      </div>
    <div class="menu">
      <img src="/icons/shop.svg" alt="Shop Icon"/>
      <img src="/icons/user.svg" alt="Cart User"/>
    </div>
  </header>
</template>

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
  }

  .menu {
    height: 58px;
    width: 130px;
  }

  .menu img{
    width: 42px;
    height: 42px;
    margin: 10px;
    cursor: pointer;
  }

</style>