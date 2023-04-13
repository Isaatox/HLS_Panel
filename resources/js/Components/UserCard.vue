<script setup>
import { computed, ref } from 'vue'
import { useMainStore } from '@/Stores/main'
import { mdiCheckDecagram, mdiAccountTie } from '@mdi/js'
import BaseLevel from '@/Components/BaseLevel.vue'
import UserAvatarCurrentUser from '@/Components/UserAvatarCurrentUser.vue'
import CardBox from '@/Components/CardBox.vue'
import FormCheckRadioGroup from '@/Components/FormCheckRadioGroup.vue'
import PillTag from '@/Components/PillTag.vue'

const mainStore = useMainStore()

const userName = computed(() => mainStore.userName)

const userSwitchVal = ref([])

defineProps({
  name: {
    type: String,
    default: null
  },
  division: {
    type: String,
    default: null
  },
  tempsTC: {
    type: Date,
    default: null
  }
})
</script>

<template>
  <CardBox>
    <BaseLevel type="justify-around lg:justify-around flex-col h-full">
      <UserAvatarCurrentUser class="lg:mx-auto" />
      <div class="space-y-3 text-center md:text-left lg:mx-12">
        <h1 class="text-2xl">
          <b>{{ name }}</b> !
        </h1>
        <p>Ma division : <b>{{ division }}</b></p>
        <p>Total des heures de cette semaine <b>{{ tempsTC }}</b></p>
        <div class="flex justify-center md:block">
          <PillTag text="Field Agent" type="info" :icon="mdiAccountTie" />
        </div>
      </div>
    </BaseLevel>
  </CardBox>
</template>
