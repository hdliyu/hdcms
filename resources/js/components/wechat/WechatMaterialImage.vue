<template>
  <div>
    <wechat-list :id.sync="wechat_id"></wechat-list>
    <div class="card" v-if="wechat_id">
      <div class="card-body">
        <div class="form-group">
          <label>素材标题</label>
          <input type="text" class="form-control" v-model="content.title" />
        </div>
        <image-single :image.sync="content.url"></image-single>
      </div>
      <div class="card-footer text-muted">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary" @click.prevent="submit">保存提交</button>
          <a href="/wechat/material?type=image" class="btn btn-outline-info">返回图片素材列表</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import imageSingle from '../ImageSingle'
import WechatList from './WechatList'

export default {
  components: {
      WechatList,
  },
  props: {
    id: { type: Number, default: 0 },
  },
  data() {
    return {
      wechat_id: 0,
      content: {
        title: '',
        url: '',
      },
    }
  },
  mounted() {
    if (this.id) {
      this.get(this.id)
    }
  },
  methods: {
    async get(id) {
      const response = await this.axios.get(`wechat/material/${id}`)
      this.wechat_id = response.wechat_id
      this.content = response.content
    },
    async submit() {
      let error = ''
      if (this.content.title.trim() == '') {
        error = '请设置素材的标题'
      }
      if (this.content.url.trim() == '') {
        error = '请选择图片'
      }
      if (error) {
        return this.$message.error(error)
      }
      if (this.id) {
        const response = await this.axios.put(`wechat/material/${this.id}`, this.$data)
      } else {
        const response = await this.axios.post(`wechat/material`, this.$data)
      }

      location.href = '/wechat/material'
    },
  },
}
</script>
<style scoped lange="scss"></style>
