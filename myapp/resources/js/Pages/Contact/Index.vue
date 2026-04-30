
<script setup>
import { router } from '@inertiajs/vue3'


defineProps(['contacts']);

function goToCreate(){
    router.visit('/contacts/create')
}

function goToEdit(id) {
    router.visit(`contacts/${id}/edit`)
}

function deleteContact(id) {
    if (confirm('Are you sure you want to delete this contact?')) {
    router.delete(`/contacts/${id}`)

}

}

</script>


<template>



<h1>Contact List</h1>

<div v-if="$page.props.flash.success" style="color:green">
{{ $page.props.flash.success }}
</div>

<ul>
    <li v-for="contact in contacts" :key="contact.id">

        <p>Name:{{ contact.name }}</p>
<p>Phone:{{ contact.phone }}</p>
<p>Category:{{ contact.category.name }}</p>




       <button class="success" @click="goToEdit(contact.id)">Edit</button> -
      <button class="danger" @click="deleteContact(contact.id)">Delete</button>

    </li>
</ul>





<button class="active" @click="goToCreate">Go To Contact Page</button>







</template>
