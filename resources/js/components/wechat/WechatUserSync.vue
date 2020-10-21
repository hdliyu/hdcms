<template>
  <a href="#" class="btn btn-outline-info" @click.prevent="get(0)">粉丝数据同步</a>
</template>

<script>
export default {
  props: {
    site_id: { type: Number, required: true },
    wechat_id: { type: Number, required: true },
  },
  methods: {
    async get(nextOpenid) {
      let response = await this.axios.get(`site/wechat/${this.site_id}/user/sync/${this.wechat_id}/${nextOpenid}`)
      console.log(response)

      if (response.state == 1) {
        return this.$message.info(`粉丝数据同步完成，共同步${response.total}个粉丝`)
      }
      this.$message.info(`本次同步${response.count}个粉丝，正在进行下次同步`)

      this.get(response.next_openid)
    },
  },
}
</script>

<style lang="scss">
</style>
