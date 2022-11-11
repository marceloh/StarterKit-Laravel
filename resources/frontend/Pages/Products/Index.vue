<template layout="AppShell,Authenticated">
  <div class="tw-p-6">
    <Head :title="title" />

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
    <q-table
      :title="title"
      :rows="products"
    />
  </div>
</template>
<script setup>
defineProps({
  title: String,
  products: Object
})
</script>
