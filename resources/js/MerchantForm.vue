<template>
    <form class="w-50 m-auto">
        <h3 class="text-center my-2">Merchant Details</h3>
        <div class="form-group">
            <label>merchant name</label>
            <input type="text" class="form-control" v-model="merchant.merchant_name">
            <div class="text-danger" v-if="errors.merchant_name">
                {{ errors.merchant_name }}
            </div>
        </div>

        <div class="form-group">
            <label>trade line</label>
            <input type="text" class="form-control" v-model="merchant.trade_line">
            <div class="text-danger" v-if="errors.trade_line">
                {{ errors.trade_line }}
            </div>
        </div>
        <div class="form-group">
            <label>trade type</label>
            <input type="text" class="form-control" v-model="merchant.trade_type">
            <div class="text-danger" v-if="errors.trade_type">
                {{ errors.trade_type }}
            </div>
        </div>

       <div class="d-flex justify-content-between">
           <button class="btn btn-primary" @click="handleSubmit">Save</button>
            <router-link to="/" class="btn btn-danger">cancel</router-link>
       </div>
    </form>
</template>

<script>

const csrf = document
    .getElementsByName("csrf-token")[0]
    .getAttribute("content");

export default {
    name: "MerchantFrom",
    data () {
        return {
            merchant: {
                merchant_name: '',
                trade_line: '',
                trade_type: ''
            },
            errors: {
                merchant_name: '',
                trade_line: '',
                trade_type: ''
            }
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault();
            console.log(this.merchant);
        }
    }
}
</script>
