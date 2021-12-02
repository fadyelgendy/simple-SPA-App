<template>
    <div>
        <Header></Header>
        <div class="container">
           <router-view></router-view>
        </div>
        <Footer></Footer>
    </div>

</template>

<script>
import Header from "./Header.vue"
import Footer from "./Footer.vue"
import MerchantForm from "./MerchantForm.vue";
export default {
    name: "App",
    components: {
        Footer,
        MerchantForm,
        Header
    }
}
</script>
