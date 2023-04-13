<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import UserAvatar from '@/Components/UserAvatar.vue'

const userName = computed(() => usePage().props.auth.user.name)
const profilePicture = computed(() => usePage().props.auth.user.picture_profile)
</script>

<template>
    <UserAvatar
        :username="userName"
        :picture-profile="profilePicture"
        api="initials"
    />
</template>
