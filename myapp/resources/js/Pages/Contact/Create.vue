<script setup>
import { useForm } from '@inertiajs/vue3';

const props=defineProps(['categories']);
const form = useForm({
    name:'',
    phone:'',
    category_id:''
})
function save() {
form.post(route('contacts.store'))

}

</script>

<template>

<h1>Contact Person</h1>

<form @submit.prevent="save">
  <label >Name:
    <input type="text" name="name" v-model="form.name" >
  </label>


  <label >Phone:
    <input type="text" name="phone" v-model="form.phone">
  </label>


<select v-model="form.category_id">
<option value="">Select Category</option>
<option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
</select>




<button type="submit"  class="success">Save </button>

</form>








</template>


<style scoped> </style>
