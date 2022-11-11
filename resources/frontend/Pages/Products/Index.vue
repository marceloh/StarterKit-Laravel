<template layout="AppShell,Authenticated">
  <div class="tw-p-6">
    <Head :title="title" />

    <h1 class="text-h4">
      {{ title }}
    </h1>

    <DialogLink href="/products/dialog/modal">
      <q-btn
        class="tw-mb-2 tw-mr-2"
        outline
        size="sm"
        color="primary"
      >
        Novo
      </q-btn>
    </DialogLink>
    <q-table :rows="products" />
  </div>
</template>
<script setup>
const props = defineProps({
  title: String,
  products: Object
})
</script>
