<script setup>
  defineProps({
    isSelected: Boolean
  });
  const emit = defineEmits();

  const toggleSelection = () => {
    emit('toggle-selection');
  };
</script>

<template>
  <div
      class="selectable-div"
      :class="{ selected: isSelected }"
      @click="toggleSelection"
  >
    <slot></slot>
  </div>
</template>

<style scoped>
  .selectable-div {
    width: 130px;
    height: 43px;
    background-color: #FFFFFF;

    display: flex;
    justify-content: center;
    align-items: center;

    cursor: pointer;

    border: 1px solid #030712;
    border-radius: 8px;

  }

  .selected {
    background-color:  #030712;
    color: #FFFFFF;
    border: none;
  }
</style>
