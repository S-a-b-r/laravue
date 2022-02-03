<template>
    <div>
        <router-link :to="{ name: 'person.index' }">Posts</router-link>
        <router-link :to="{ name: 'person.create' }">Create</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
