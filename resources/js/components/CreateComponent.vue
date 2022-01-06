<template>
  <div class="col-8 container">
      <div class="mb-3">
          <label for="name">Введите имя</label>
          <input type="text" v-model="name" class="form-control" id="name">
      </div>
      <div class="mb-3">
          <label for="second_name">Введите фамилию</label>
          <input type="text" v-model="second_name" class="form-control" id="second_name">
      </div>
      <div class="mb-3">
          <label for="age">Введите возраст</label>
          <input type="number" v-model="age" class="form-control" id="age">
      </div>
      <div class="mb-4">
          <button class="btn btn-primary" @click.prevent="addPerson">Add</button>
      </div>
  </div>
</template>

<script>
export default {
    name: "CreateComponent",
    data(){
        return{
            name: null,
            second_name: null,
            age: null,
        }
    },
    methods:{
        addPerson(){
            axios.post('/api/people', {name: this.name, age: this.age, second_name: this.second_name})
            .then(data => {
                this.name = null;
                this.second_name = null;
                this.age = null;
                this.$parent.$refs.index.getPeople();
            });
        }
    }
}
</script>

<style scoped>

</style>
