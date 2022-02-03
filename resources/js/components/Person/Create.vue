<template>
    <div class="w-25 m-2">
        <div class="mb-3">
            <input type="text" v-model="name" placeholder="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" v-model="second_name" placeholder="second name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" v-model="age" placeholder="age" class="form-control">
        </div>
        <div class="mb-3">
            <input :disabled="!isDisabled" @click.prevent="store" type="submit" placeholder="Add" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from "../../router";
export default {
    name: "Create",
    data(){
        return{
            name: null,
            second_name: null,
            age: null,
        }
    },
    methods:{
        store(){
            axios.post('/api/people', {name: this.name, second_name: this.second_name, age: this.age})
            .then( res => {
                router.push({name:'person.index'})
            })
        }
    },
    computed: {
        isDisabled(){
            return this.name && this.age && this.second_name;
        }
    }
}
</script>

<style scoped>

</style>
