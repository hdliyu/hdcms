<template>
  <div>
    <wechat-list :id.sync="wechat_id"></wechat-list>
    <div class="card" v-if="wechat_id">
      <div class="card-body">
        <div class="form-group">
          <label>素材标题</label>
          <input type="text" class="form-control" v-model="content.title" />
        </div>
        <voice-upload :file.sync="content.url"></voice-upload>
      </div>
      <div class="card-footer text-muted">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary" @click.prevent="submit">保存提交</button>
          <a href="/wechat/material?type=image" class="btn btn-outline-info">返回语音素材列表</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
        error = '请选择语音文件'
      }
      if (error) {
        return this.$message.error(error)
      }
      if (this.id) {
        const response = await this.axios.put(`wechat/material/${this.id}?type=voice`, this.$data)
      } else {
        const response = await this.axios.post(`wechat/material?type=voice`, this.$data)
      }

      location.href = '/wechat/material?type=voice'
    },
  },
}
</script>
<style scoped lange="scss"></style>
