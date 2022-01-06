import Vue from 'vue'
import IndexComponent from "./components/IndexComponent";
import CreateComponent from "./components/CreateComponent";
import PersonComponent from "./components/PersonComponent";
require('./bootstrap');

const welcome = new Vue({
    el: '#welcome',
    components:{
        PersonComponent
    }
});
