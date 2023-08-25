<script setup>
import { defineProps, defineEmits } from 'vue';
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
  width: 100%;
  height: 48px;
  background-color: #FFFFFF;

  display: flex;
  justify-content: center;
  align-items: center;

  cursor: pointer;

  border: 1px solid #030712;
  border-radius: 8px;

  margin-top: 16px;
}

.selected {
  background-color:  #030712;
  color: #FFFFFF;
  border: none;
}
</style>
