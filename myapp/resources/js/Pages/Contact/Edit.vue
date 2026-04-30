<script setup>
import { useForm,router } from '@inertiajs/vue3';

const props=defineProps(['categories','contact']);
const form = useForm({
    name:props.contact.name,
    phone:props.contact.phone,
    category_id:props.contact.category_id
})
function submit() {
form.put(`/contacts/${props.contact.id}`)

}


function goToIndex(){
router.visit('/contacts')
}


</script>

<template>

<h1>Contact Edit</h1>

<div v-if="$page.props.flash.success" style="color:green">
{{ $page.props.flash.success }}
</div>



<form @submit.prevent="submit">
  <label >Name:
    <input type="text" name="name" v-model="form.name" >
  </label>





  <label >Phone:
    <input type="text" name="phone" v-model="form.phone">
  </label>

<label>Category:</label>
<select v-model="form.category_id">
<option value="">Select Category</option>
<option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
</select>




<button type="submit"  class="success">Save </button>

</form>

<button class="active" @click="goToIndex">Index List Page</button>






</template>


<style scoped> </style>
