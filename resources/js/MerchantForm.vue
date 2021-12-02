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
        async handleSubmit(e) {
            e.preventDefault();
            if (!this.merchant.merchant_name) {
                return (this.errors.merchant_name = "This field is required");
            }
            this.errors.merchant_name = '';

            if (!this.merchant.trade_type) {
                return (this.errors.trade_type = "This field is required");
            }
            this.errors.trade_type = "";

            if (!this.merchant.trade_line) {
                return (this.errors.trade_line = "This field is required");
            }
            this.errors.trade_line = "";

            if (!this.errors.length) {
                await axios.post("/api/merchants/store", this.merchant).then(res => {
                    if (!res.data.success) {
                        console.log(res.data);
                        this.errors = res.data.errors;
                    }
                    else {
                        this.merchant.merchant_name = '';
                        this.merchant.trade_line = '';
                        this.merchant.trade_type = '';
                        alert('data saved successfully');
                    }
                });
            }
        }
    }
}
</script>
