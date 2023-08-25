<script setup>
  import { ref, defineProps } from 'vue';

  const props = defineProps({
    label: String,
    placeholder: String,
    type: {
      type: String,
      default: 'text'
    },
    modelValue: String
  });

  const inputValue = ref(props.modelValue);
  const inputType = ref(props.type);

  const isPassword = inputType.value === 'password'; // Verifica se o campo é de senha

  const eyeIconSrc = '@/assets/eye-icon.png'; // Caminho da imagem do olho

  const togglePasswordVisibility = () => {
    inputType.value = inputType.value === 'password' ? 'text' : 'password';
  };
</script>

<template>
  <div class="custom-input">
    <label>{{ label }}</label>
    <div class="input-container">
      <input
          v-model="inputValue"
          :placeholder="placeholder"
          :type="inputType"
          @input="$emit('input', inputValue)"
      />
      <button v-if="isPassword" class="toggle-password" @click="togglePasswordVisibility">
        <img src="/icons/eye.svg" alt="Toggle Password Visibility" />
      </button>
    </div>
  </div>
</template>

<style scoped>
.custom-input {
  margin-bottom: 16px;
}

label {
  display: block;
  margin-bottom: 8px;
}

.input-container {
  position: relative;
}

  input {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #E1E3E5;
    border-radius: 8px;
    font-size: 16px;
  }

  .toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    border: none;
    background: transparent;
    cursor: pointer;
  }

  .toggle-password img{
    max-width: 24px;
    max-height: 24px;
  }
</style>