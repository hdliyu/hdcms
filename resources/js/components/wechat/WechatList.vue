<template>
  <div class="card mb-3">
    <div class="card-header">公众号选择</div>
    <div class="card-body">
      <div class="form-group">
        <label>微信公众号</label>
        <select class="form-control" size="3" v-model="wechat_id">
          <option v-for="wechat in wechats" :key="wechat.id" :value="wechat.id">{{ wechat.title }}</option>
        </select>
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
      wechat_id: this.id,
      wechats: [],
    }
  },
  watch: {
    wechat_id(n) {
      this.$emit('update:id', n)
    },
    id(n) {
      this.wechat_id = n
    },
  },
  mounted() {
    this.getWechats()
  },
  methods: {
    async getWechats() {
      this.wechats = await this.axios.get(`wechat/rule/wechat`)
    },
  },
}
</script>
