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
                    <show-component :person="person" :ref="`show_${person.id}`"></show-component>
                    <edit-component :person="person" :ref="`edit_${person.id}`"></edit-component>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import EditComponent from "./EditComponent";
import ShowComponent from "./ShowComponent";

export default {
    name: "IndexComponent",
    components: {ShowComponent, EditComponent},
    data(){
        return{
            people: null,
            editPersonId: null,
            name: '',
            second_name: '',
            age: '',
        }
    },

    mounted(){
        this.getPeople();
    },

    methods: {
        getPeople(){
            axios.get('/api/people')
            .then(data => {
                this.people = data.data;
            })
        },

        deletePerson(id){
            axios.delete(`/api/people/${id}`)
                .then(()=>this.getPeople());
        },

        changeEditPersonId(id = null, name = null, second_name = null, age = null){
            this.editPersonId = id;
            if(id !== null){
                let editName = `edit_${id}`;
                this.$refs[editName][0].name = name;
                this.$refs[editName][0].second_name = second_name;
                this.$refs[editName][0].age = age;
            }

        },

        isEdit(id){
            return this.editPersonId === id;
        }
    },


}
</script>

<style scoped>

</style>
