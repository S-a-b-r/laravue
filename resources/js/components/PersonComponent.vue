<template>
    <div>
        <index-component ref="index"></index-component>
        <create-component ref="create"></create-component>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent";
import IndexComponent from "./IndexComponent";
export default {
    name: "PersonComponent",
    components: {CreateComponent, IndexComponent}
}
</script>

<style scoped>

</style>
