<script setup>
  import { ref } from 'vue';

  const props = defineProps({
    label: String,
    placeholder: String,
    type: {
      type: String,
      default: 'text'
    },
    modelValue: Object
  });

  const inputValue = ref(props.modelValue);
  const inputType = ref(props.type);

  const isPassword = inputType.value === 'password';

  const togglePasswordVisibility = () => {
    inputType.value = inputType.value === 'password' ? 'text' : 'password';
  };
</script>

<template>
  <div class="custom-input">
    <div class="input-container">
      <label>{{ label }}</label>
      <input
        v-model="inputValue"
        :placeholder="placeholder"
        :type="inputType"
        @input="$emit('input', inputValue)"
      >

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

  .input-container {
    position: relative;
  }

  .toggle-password {
    position: absolute;
    bottom: 12px;
    right: 12px;
    width: 24px;
    height: 24px;
    border: none;
    background: transparent;
    padding: 0;
    cursor: pointer;
  }

  .toggle-password img{
    width: 24px;
    height: 24px;
  }
</style>