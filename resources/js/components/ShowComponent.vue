<template>
    <tr :class="this.$parent.isEdit(person.id)? 'd-none' : ''">
        <th scope="row">{{ person.id }}</th>
        <td>Name: {{ person.name }}</td>
        <td>SecondName: {{ person.second_name }}</td>
        <td>Age: {{ person.age }}</td>
        <td><a href="#" class="btn btn-success" @click.prevent="changeEditPersonId(person.id,
                         person.name, person.second_name, person.age)">Edit</a></td>
        <td><a href="#" class="btn btn-danger" @click.prevent="deletePerson(person.id)">Delete</a></td>
    </tr>
</template>

<script>

export default {
    name: "ShowComponent",

    props: [
      'person'
    ],
    data() {
        return {
            name: '',
            second_name: '',
            age: '',
        }
    },

    methods: {
        deletePerson(id) {
            axios.delete(`/api/people/${id}`)
                .then(() => this.$parent.getPeople());
        },

        changeEditPersonId(id, name, second_name, age) {
            this.$parent.editPersonId = id;
            let editName = `edit_${id}`;
            let fullEditName = this.$parent.$refs[editName][0];
            fullEditName.name = name;
            fullEditName.second_name = second_name;
            fullEditName.age = age;
        },
    },


}
</script>

<style scoped>

</style>
