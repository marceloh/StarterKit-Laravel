<template>
  <Modal>
    <q-card class=" tw-text-white">
      <q-toolbar class="tw-bg-primary-600">
        <q-toolbar-title>
          {{ title }}
        </q-toolbar-title>
      </q-toolbar>
      <q-card-section class="tw-bg-primary-500">
        <span class="tw-text-lg">{{ message }}</span>
      </q-card-section>
      <div
        class="q-pa-md"
        style="max-width: 400px"
      >
        <form
          class="q-gutter-md"
          @submit.prevent="product.post(route('products.store'))"
          @reset="onReset"
        >
          <q-input
            v-model="product.name"
            name="product"
            placeholder="Produto"
          />

          <q-input
            v-model="product.description"
            name="description"
            label="Your description *"
            hint="Description"
            :rules="[ val => val && val.length > 0 || 'Please type something']"
          />

          <div>
            <q-btn
              label="Submit"
              type="submit"
              color="primary"
            />
            <q-btn
              label="Reset"
              type="reset"
              color="primary"
              flat
              class="q-ml-sm"
            />
          </div>
        </form>
      </div>
    </q-card>
  </Modal>
</template>

<script setup>
const props = defineProps({
  title: String,
  message: String,
  position: String,
  product: Object,
  errors: Object
})

const product = useForm(props.product)

function onReset () {
  product.name = null
  product.description = null
}
</script>
