<template>
    <div class="d-flex justify-content-around p-5">
       <router-link class="btn btn-primary" to="/merchants/create">create a merchant</router-link>
        <router-link class="btn btn-warning" to="/">login</router-link>
    </div>
</template>

<script>
export default {
    name: "Welcome"
}
</script>
