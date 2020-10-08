<template>
    <button @click="showModel" type="button" class="btn btn-sm btn-primary">
        المتبقى <span class="badge badge-light">{{amount}}</span>
    </button>
</template>
<script>
const Toast = Swal.mixin({
    toast: true,
    showConfirmButton: false,
    timer: 3000
});

export default {
    props :['amount'],
    components: {},
    mounted() {},
    data() {
        return {};
    },
    methods: {
        showModel (){
            alert('wwwwwwwwwwwwww')
        }
    }
};
</script>
<style lang="stylus" scoped></style>
