<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3'
import { mdiAccount, mdiAsterisk } from '@mdi/js'
import LayoutGuest from '@/Layouts/LayoutGuest.vue'
import SectionFullScreen from '@/Components/SectionFullScreen.vue'
import CardBox from '@/Components/CardBox.vue'
import FormCheckRadioGroup from '@/Components/FormCheckRadioGroup.vue'
import FormField from '@/Components/FormField.vue'
import FormControl from '@/Components/FormControl.vue'
import BaseDivider from '@/Components/BaseDivider.vue'
import BaseButton from '@/Components/BaseButton.vue'
import BaseButtons from '@/Components/BaseButtons.vue'
import FormValidationErrors from '@/Components/FormValidationErrors.vue'
import NotificationBarInCard from '@/Components/NotificationBarInCard.vue'
import BaseLevel from '@/Components/BaseLevel.vue'

const props = defineProps({
  canResetPassword: Boolean,
  status: {
    type: String,
    default: null
  }
})

const form = useForm({
  name: '',
  password: '',
  remember: []
})

const submit = () => {
  form
    .transform(data => ({
      ...data,
      remember: form.remember && form.remember.length ? 'on' : ''
    }))
    .post(route('login'), {
      onFinish: () => form.reset('password'),
    })
}
</script>

<template>
  <LayoutGuest>

    <Head title="Login" />

    <SectionFullScreen v-slot="{ cardClass }" bg="purplePink">
      <CardBox :class="cardClass" form @submit.prevent="submit">
        <FormValidationErrors />

        <NotificationBarInCard v-if="status" color="info">
          {{ status }}
        </NotificationBarInCard>

        <FormField label="Nom d'utilisateur" label-for="name" help="Merci de renseigner votre nom d'utilisateur">
          <FormControl v-model="form.name" :icon="mdiAccount" id="name" autocomplete="username" required />
        </FormField>

        <FormField label="Mot de passe" label-for="password" help="Merci de renseigner votre mot de passe">
          <FormControl v-model="form.password" :icon="mdiAsterisk" type="password" id="password"
            autocomplete="current-password" required />
        </FormField>

        <FormCheckRadioGroup v-model="form.remember" name="remember" :options="{ remember: 'Se souvenir de moi' }" />

        <BaseDivider />

        <BaseLevel>
          <BaseButtons>
            <BaseButton type="submit" color="info" label="Se connecter" :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing" />
            <!-- <BaseButton v-if="canResetPassword" :route-name="route('password.request')" color="info" outline
              label="Remind" /> -->
          </BaseButtons>
          <Link :href="route('register')">
          S'enregistrer
          </Link>
        </BaseLevel>
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest>
</template>
