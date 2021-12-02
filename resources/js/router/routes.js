import MerchantForm from "../MerchantForm.vue";
import Welcome from "../Welcome.vue";

const routes = [
    {
        name: "home",
        path: "/",
        component: Welcome,
        meta: {requireAuth: false}
    },
    {
        name: "merchants.create",
        path: "/merchants/create",
        component: MerchantForm,
        meta: {requireAuth: false}
    }
];

export default routes;
