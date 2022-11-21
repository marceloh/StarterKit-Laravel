<template layout="AppShell,Authenticated">
  <div class="tw-p-6">
    <Head :title="title" />

    <q-table
      :title="title"
      :rows="products"
      :columns="columns"
      :row-key="products?.id"
    >
      <template #top>
        <span class="text-h5">Produtos</span>
        <q-space />
        <q-btn
          color="primary"
          :disable="loading"
          label="Novo"
          @click="addRow"
        />
      </template>
      <template #body-cell-actions="props">
        <q-td :props="props">
          <div class="col-12 q-gutter-sm">
            <q-btn
              color="blue"
              dense
              size="sm"
              @click="edit(props.row)"
            >
              <i-material-symbols-edit />
            </q-btn>
            <q-btn
              color="negative"
              dense
              size="sm"
              @click="destroy(props.row.id)"
            >
              <i-material-symbols-delete-outline />
            </q-btn>
          </div>
        </q-td>
      </template>
    </q-table>
  </div>
</template>
<script setup>
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  title: String,
  products: Object
})

function addRow () {
  Inertia.get(route('products.modal', 'modal'))
}

function destroy (id) {
  if (confirm('Are you sure you want to Delete')) {
    Inertia.delete(route('products.destroy', id))
  }
}

function edit (product) {
  Inertia.get(route('products.modal', 'modal'))
}

const columns = [
  {
    label: 'Name',
    field: 'name',
    name: 'name',
    align: 'left'
  },
  {
    label: 'Description',
    field: 'description',
    name: 'description',
    align: 'left'
  },
  {
    label: 'Type',
    field: 'type',
    name: 'type',
    align: 'left'
  },
  {
    label: 'Ações',
    field: 'actions',
    name: 'actions',
    align: 'right'
  }
]

</script>
