<template>
    <a href="#" @click.prevent="del" class="btn btn-danger btn-sm">
        {{title}}
    </a>
</template>

<script>
    export default {
        props: {
            title:{ default:'删除'},
            action: { required: true, type: String },
        },
        methods: {
            del($event) {
                this.$confirm('确认删除吗?', '提示', {
                    type: 'warning'
                })
                    .then(async () => {
                        console.log(this.action)
                        await this.axios.delete(this.action)
                        location.reload(true)
                    })
                    .catch(() => {})
            }
        }
    }
</script>

<style>
</style>
