<script setup>
import { computed } from 'vue'

const props = defineProps({
    username: {
        type: String,
        required: true
    },
    avatar: {
        type: String,
        default: null
    },
    api: {
        type: String,
        default: 'avatars'
    },
    pictureProfile: {
        type: String,
        default: null
    }
})


const avatar = computed(
    () => {
        if (props.pictureProfile !== null) {
            return props.pictureProfile
        } else {
            return props.avatar ?? `https://avatars.dicebear.com/api/${props.api}/${props.username.replace(/[^a-z0-9]+/i, '-')}.svg`
        }
    }
)


const username = computed(() => props.username)
</script>

<template>
  <div>
    <img
      :src="avatar"
      :alt="username"
      class="rounded-full block h-auto w-[12rem] bg-gray-100 dark:bg-slate-800"
    >
  </div>
</template>
