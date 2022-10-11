<template layout="AppShell,Authenticated">
  <div class="tw-p-6">
    <Head :title="title" />

    <h1 class="text-h4 tw-mb-6">
      {{ title }}
    </h1>

    <FormMyTest />

    <q-btn
      color="positive"
      @click="$inertia.post('/notify/success')"
    >
      Success toast
    </q-btn>

    <q-btn
      color="positive"
      @click="$inertia.post('/notify2/error')"
    >
      Com warning
    </q-btn>

    <q-skeleton type="QAvatar" />

    <q-page class="flex flex-center">
      <q-card>
        <q-card-section>
          <div class="text-h6 text-grey-9">
            My Content
          </div>
        </q-card-section>
      </q-card>
    </q-page>
  </div>
</template>

<script setup>
defineProps({
  title: String
})
</script>
