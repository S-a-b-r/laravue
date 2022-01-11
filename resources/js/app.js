import Vue from 'vue'
import router from "./router";
import Index from "./components/Index";
import IndexComponent from "./components/IndexComponent";
import CreateComponent from "./components/CreateComponent";
import PersonComponent from "./components/PersonComponent";
require('./bootstrap');

const app = new Vue({
    el: '#app',
    components:{
        Index
    },
    router
});
