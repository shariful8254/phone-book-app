<script setup>
defineProps(['contact']);
import{Link} from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

function goToCreate(){
router.visit('/contacts/create')
}

//function goToEdit(id) {
  //  router.visit(`contacts/${id}/edit`)
//}

//function deleteContact(id) {
  //  if (confirm('Are you sure you want to delete this contact?')) {
   // router.delete(`/contacts/${id}`)

//}

//}

</script>
<template>
<h2>Contact Details</h2>

<div v-if="$page.props.flash.success" style="color:green">
{{ $page.props.flash.success }}
</div>


        <p>Name:{{ contact.name }}</p>
<p>Phone:{{ contact.phone }}</p>
<p>Category:{{ contact.category.name }}</p>


<Link :href="`/contacts/${contact.id}/edit`" class="success">
Edit
</Link>





<button class="success" @click="goToCreate">Go To Create Page</button>

</template>
