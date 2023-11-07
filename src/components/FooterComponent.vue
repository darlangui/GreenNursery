<script setup>
</script>

<template>
  <footer>
    <div class="container">
      <div class="logo">GreenNursery</div>
      <div class="copyright">Todos os direitos reservados, 2023</div>
    </div>
  </footer>
</template>

<style scoped>
  footer {
    width: 100%;
    max-width: 100%;
    background-color: #030712;
    
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
  }

  footer .container {
    padding: 40px 0;

    display: flex;
    justify-content: space-between;
    align-items: center;

    width: 100%;
    max-width: 1112px;
  }

  .logo {
    color: var(--white);
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    line-height: 120%;
  }

  .copyright {
    color: var(--white);
    font-size: 16px;
    line-height: 120%;
  }
</style>