<template>
    <tr :class="this.$parent.isEdit(person.id)? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td><input type="text" class="form-control" v-model="name"></td>
        <td><input type="text" class="form-control" v-model="second_name"></td>
        <td><input type="number" class="form-control" v-model="age"></td>
        <td><a href="#" class="btn btn-success" @click.prevent="updatePeople(person.id)">Update</a></td>
    </tr>
</template>

<script>

export default {
    name: "EditComponent",

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
        updatePeople(id) {
            axios.patch(`/api/people/${id}`, {name: this.name, second_name: this.second_name, age: this.age})
                .then(() => this.$parent.getPeople());
            this.$parent.changeEditPersonId(null);
        }
    }
}
</script>

<style scoped>

</style>
