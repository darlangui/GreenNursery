<script setup>
import Header from "@/components/Header.vue";
import Footer from "@/components/Footer.vue";
import CustomButton from "@/components/icons/ButtonCustom.vue";
import ButtonWhite from "@/components/icons/ButtonWhite.vue";

const handleButtonClick = () => {
  console.log('Botão clicado!');
};

const handleButtonWhiteClick = () => {
  console.log('Botão white clicado!');
}
</script>
<template>
  <Header/>
  <main>
    <section class="information">
      <div class="goback">
        <img src="/icons/arrowleft.svg" alt="Arrow Left"/> <span>Voltar para o início</span>
      </div>
      <div class="panel">
        <section class="image">
          <img src="/image/plant2.svg" alt="Plant Image"/>
        </section>
        <section class="description">
          <h3>Integer vitae justo</h3>
          <p>Proin id ligula dictum,
            convallis enim ut, facilisis massa.
            Mauris a nisi ut sapien blandit imperdie.
            Duis ac augue ut lectus congue luctus.
            Vivamus eu lacus vestibulum, luctus ante
            dignissim, interdum</p>
          <span>R$ 0,00</span>

          <ButtonWhite @click="handleButtonWhiteClick">
            <template #button>
              Adicionar ao carrinho
            </template>
          </ButtonWhite>

          <CustomButton @click="handleButtonClick">
            <template #button>
              Comprar agora
            </template>
          </CustomButton>
        </section>
      </div>
    </section>
  </main>
  <Footer/>
</template>

<style scoped>
  main {
    width: 100%;
    height: 772px;

    display: flex;
    flex-direction: column;
    align-items: center;

    margin-bottom: 132px;
  }

  .information {
    margin-top: 50px;
  }

  .goback {
    height: 32px;
    max-width: 1112px;

    font-size: 16px;

    display: flex;
    align-items: center;

    cursor: pointer;

    gap: 10px;
    margin-bottom: 48px;
  }
  .goback img {
    max-width: 32px;
    max-height: 32px;
  }

  .panel {
    display: flex;
  }

  .image {
    background-color: #F8F8FA;
    width: 632px;
    height: 691px;

    display: flex;
    justify-content: center;
    align-items: end;

    margin-right: 40px;
  }

  .image img {
    max-width: 532px;
    max-height: 578px;
    min-width: 530px;
    min-height: 576px;
  }

  .description {
    max-width: 440px;
    height: 396px;
  }

  .description h3{
    margin-bottom: 8px;
    font-size: 24px;
    font-weight: 500;
  }

  .description p {
    margin-bottom: 24px;
    color: #475569;
    font-size: 16px;
  }

  .description span {
    margin-bottom: 24px;
    font-size: 32px;
    font-weight: 500;
  }
</style>>