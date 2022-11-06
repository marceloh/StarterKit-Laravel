<template layout="AppShell,Authenticated">
  <Head :title="title" />

  <h1 class="text-h4">
    {{ title }}
  </h1>

  <q-page class="flex flex-center">
    <q-table
      :rows="[
        {
          id: 1,
          name: 'Luke Diebold'
        },
        {
          id: 2,
          name: 'Pan'
        },
        {
          id: 3,
          name: 'Lily'
        },
        {
          id: 4,
          name: 'Goku'
        }
      ]"
    />
  </q-page>
</template>
<script setup>
import axios from 'axios'
import { onMounted } from 'vue'

const products = ref([])

defineProps({
  title: String
})

onMounted(async () => {
  getProducts()
})

const getProducts = async () => {
  const response = await axios.get('/api/get_all_product')
  products.value = response.data.products
  console.log('products', products.value)
}
</script>
