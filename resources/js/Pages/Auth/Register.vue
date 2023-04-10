<script setup>
import { useForm, usePage, Head } from '@inertiajs/vue3'
import { computed } from 'vue'
import { mdiAccount, mdiEmail, mdiFormTextboxPassword } from '@mdi/js'
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

const form = useForm({
  name: '',
  password: '',
  password_confirmation: '',
  terms: [],
})

const hasTermsAndPrivacyPolicyFeature = computed(() => usePage().props.value?.jetstream?.hasTermsAndPrivacyPolicyFeature )

const submit = () => {
  form
    .transform(data => ({
      ... data,
      terms: form.terms && form.terms.length
    }))
    .post(route('register'), {
      onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
  <LayoutGuest>
    <Head title="Register" />

    <SectionFullScreen
      v-slot="{ cardClass }"
      bg="purplePink"
    >
      <CardBox
        :class="cardClass"
        class="my-24"
        form
        @submit.prevent="submit"
      >
        <FormValidationErrors />

        <FormField
          label="Prénom / Nom"
          label-for="name"
          help="Merci d'écrire votre prénom / nom en suivant ce format : j.doe" 
        >
          <FormControl
            v-model="form.name"
            id="name"
            :icon="mdiAccount"
            autocomplete="name"
            type="text"
            placeholder = "Exemple : j.doe"
            required
          />
        </FormField>

        <FormField
          label="Mot de passe"
          label-for="password"
          help="Le mot de passe doit faire minimum 8 caractères"
        >
          <FormControl
            v-model="form.password"
            id="password"
            :icon="mdiFormTextboxPassword"
            type="password"
            autocomplete="new-password"
            required
          />
        </FormField>

        <FormField
          label="Confirmer mot de passe"
          label-for="password_confirmation"
          help="Merci de confirmer votre mot de passe"
        >
          <FormControl
            v-model="form.password_confirmation"
            id="password_confirmation"
            :icon="mdiFormTextboxPassword"
            type="password"
            autocomplete="new-password"
            required
          />
        </FormField>

        <FormCheckRadioGroup
          v-if="hasTermsAndPrivacyPolicyFeature"
          v-model="form.terms"
          name="remember"
          :options="{ agree: 'I agree to the Terms' }"
        />

        <BaseDivider />

        <BaseButtons>
          <BaseButton
            type="submit"
            color="info"
            label="S'inscrire"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          />
          <BaseButton
            :route-name="route('login')"
            color="info"
            outline
            label="Se connecter"
          />
        </BaseButtons>
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest>
</template>
