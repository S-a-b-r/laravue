<template>
    <div class="w-25 m-2" v-if="person">
        <div class="mb-3">
            Name: {{this.person.name}}
        </div>
        <div class="mb-3">
            SecondName: {{this.person.second_name}}
        </div>
        <div class="mb-3">
            Age: {{this.person.age}}
        </div>
        <div class="mb-3">
            <router-link :to="{name:'person.edit', params:{id:this.person.id}}">Edit</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    data(){
        return {
            person: null,
        }
    },
    mounted() {
      this.getPerson();
    },
    methods:{
        getPerson(){
            axios.get(`/api/people/${this.$route.params.id}`)
            .then( res => {
                this.person = res.data.data
            })
        },
    }
}
</script>

<style scoped>

</style>
