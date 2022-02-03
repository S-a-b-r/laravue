<template>
    <div>
        <tr>
            <th scope="row">{{id}}</th>
            <td><input type="text" class="form-control" v-model="name"></td>
            <td><input type="text" class="form-control" v-model="second_name"></td>
            <td><input type="number" class="form-control" v-model="age"></td>
            <td><button :disabled="!isDisabled" class="btn btn-success" @click.prevent="updatePerson">Update</button></td>
        </tr>
    </div>
</template>

<script>

export default {
    name: "Edit",

    data(){
        return {
            name: null,
            second_name: null,
            age: null,
            id: null,
        }
    },
    mounted() {
        this.id = this.$route.params.id
        this.getPerson()
    },

    methods:{
        getPerson(){
            axios.get(`/api/people/${this.id}`)
            .then( res => {
                this.name = res.data.data.name;
                this.second_name = res.data.data.second_name;
                this.age = res.data.data.age;
            })
        },
        updatePerson(){
            axios.patch(`/api/people/${this.id}`,{name: this.name, second_name: this.second_name, age: this.age})
            .then( res => {
                this.$router.push({name: 'person.show', params:{id: this.id}})
            })
        }
    },
    computed:{
        isDisabled(){
            return this.name && this.age && this.second_name;
        }
    }
}
</script>

<style scoped>

</style>
