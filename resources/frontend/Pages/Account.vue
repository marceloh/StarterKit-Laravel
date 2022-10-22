<template layout="AppShell,Authenticated">
  <div class="tw-p-6">
    <Head :title="title" />

    <h1 class="text-h4">
      {{ title }}
    </h1>

    <form
      class="column q-pa-md shadow-2"
      @submit.prevent="user.post(route('account.store'))"
    >
      <q-avatar
        class="text-white"
        color="primary"
      >
        {{ user.name.charAt(0) }}
      </q-avatar>
      <q-input
        v-model="user.name"
        name="user"
        placeholder="Usuário"
        :rules="[requiredRule]"
      />

      <q-input
        v-model="user.email"
        name="email"
        placeholder="Email"
        :rules="[requiredRule]"
      />

      <q-btn
        color="indigo"
        label="Submit"
        type="submit"
      />
    </form>
  </div>
</template>

<script setup>
const props = defineProps({
  title: String,
  user: Object,
  errors: Object
})

const user = useForm(props.user)

const requiredRule = val => (val && val.length > 0) || 'Por favor digite algo'
</script>
