// require('./bootstrap');
import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import axios from "@/axios.js";
import axiosw from "@/axiosw.js";

Vue.prototype.$http = axios;
Vue.prototype.$httpw = axiosw;
InertiaProgress.init()

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props }) {
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
