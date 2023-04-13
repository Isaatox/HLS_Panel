<script setup>
import { useForm, Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import LayoutGuest from '@/Layouts/LayoutGuest.vue'
import SectionFullScreen from '@/Components/SectionFullScreen.vue'
import CardBox from '@/Components/CardBox.vue'
import FormControl from '@/Components/FormControl.vue'
import FormField from '@/Components/FormField.vue'
import BaseDivider from '@/Components/BaseDivider.vue'
import BaseButton from '@/Components/BaseButton.vue'
import FormValidationErrors from '@/Components/FormValidationErrors.vue'

const form = useForm({
  password: ''
})

const passwordInput = ref(null)

const submit = () => {
  form.post(route('password.confirm'), {
    onFinish: () => {
      form.reset()

      passwordInput.value?.focus()
    }
  })
}
</script>

<template>
  <LayoutGuest>
    <Head title="Zone sécurisée" />
    
    <SectionFullScreen
      v-slot="{ cardClass }"
      bg="purplePink"
    >
      <CardBox
        :class="cardClass"
        form
        @submit.prevent="submit"
      >
        <FormValidationErrors />

        <FormField>
          <div class="mb-4 text-sm text-gray-600">
            Ceci est une zone sécurisée de l'application. Merci de renseigner ton mot de passe avant de continuer
          </div>
        </FormField>

        <FormField
          label="Password"
          label-for="password"
          help="Please enter your password to confirm"
        >
          <FormControl
            id="password"
            @set-ref="passwordInput = $event"
            v-model="form.password"
            type="password"
            required
            autocomplete="current-password"
          />
        </FormField>

        <BaseDivider />

        <BaseButton
          type="submit"
          color="info"
          label="Confirm"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        />
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest>
</template>
