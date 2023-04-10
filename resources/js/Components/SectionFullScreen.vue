<script setup>
import { computed } from 'vue'
import { useStyleStore } from '@/Stores/style'
import { gradientBgPurplePink, gradientBgDark, gradientBgPinkRed } from '@/colors'

const props = defineProps({
  bg: {
    type: String,
    required: true,
    validator: value => ['purplePink', 'pinkRed'].includes(value)
  }
})

const colorClass = computed(() => {
  if (useStyleStore().darkMode) {
    return gradientBgDark
  }

  switch (props.bg) {
    case 'purplePink':
      return gradientBgPurplePink
    case 'pinkRed':
      return gradientBgPinkRed
  }

  return ''
})
</script>

<template>
  <div class="flex min-h-screen items-center justify-center" :class="colorClass">
    <img
      src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Seal_of_the_United_States_Department_of_Homeland_Security.svg/800px-Seal_of_the_United_States_Department_of_Homeland_Security.svg.png"
      class="absolute opacity-10" alt="Description de l'image" />
      <div class="relative w-full flex justify-center">
      <slot card-class="w-11/12 md:w-7/12 lg:w-6/12 xl:w-4/12 shadow-2xl" />
    </div>
  </div>
</template>


