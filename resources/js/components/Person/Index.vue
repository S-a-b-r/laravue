<template>
    <div class="container col-10">
        <table class="table">
            <thead>
            <th scope="row">Id</th>
            <th>Name</th>
            <th>SecondName</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr>
                    <th scope="row">{{ person.id }}</th>
                    <td><router-link :to="{name:'person.show', params:{id:person.id}}">{{ person.name }}</router-link></td>
                    <td>{{ person.second_name }}</td>
                    <td>{{ person.age }}</td>
                    <td><a href="#" class="btn btn-outline-success" @click.prevent="editPerson(person.id)">Edit</a></td>
                    <td><a href="#" class="btn btn-outline-danger" @click.prevent="deletePerson(person.id)">Delete</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",
    data(){
        return {
            people: null,
        }
    },
    methods:{
        getPeople(){
            axios.get('/api/people')
            .then( res => {
                this.people = res.data.data
            })
        },
        editPerson(id){
            this.$router.push({name: 'person.edit', params:{ id: id}})
        },
        deletePerson(id){
            axios.delete(`/api/people/${id}`)
            .then( res =>{
                this.getPeople()
            })
        }
    },
    mounted() {
        this.getPeople();
    }
}
</script>

<style scoped>

</style>
