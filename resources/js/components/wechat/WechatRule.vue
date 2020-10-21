<template>
  <div>
    <div class="card">
      <div class="card-header d-flex">
        <span class="flex-fill">关键词设置</span>
        <small>关键词已经被使用时将会忽略</small>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleFormControlSelect1">微信公众号</label>
          <select class="form-control" id="exampleFormControlSelect1" v-model="rule.wechat_id" size="3">
            <option v-for="wechat in wechats" :key="wechat.id" :value="wechat.id">{{ wechat.title }}</option>
          </select>
        </div>
        <div class="form-group">
          <label>规则名称</label>
          <input type="text" class="form-control" v-model="rule.title" :required="required" />
        </div>

        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">完整匹配</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">模糊匹配</a>
          </div>
        </nav>
        <div class="tab-content border border-top-0 p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="input-group mb-3" v-for="(keyword, index) in keywords" :key="index" v-show="!keyword.regexp">
              <input type="text" class="form-control" :class="{ 'border-danger': keyword.has }" v-model="keyword.word" @blur="checkKeywod(keyword)" />
              <a href="#" class="input-group-append" @click.prevent="del(index)">
                <span class="input-group-text">删除</span>
              </a>
            </div>
            <button class="btn btn-outline-primary btn-sm" type="button" @click="add(false)">添加完全匹配关键词</button>
          </div>

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="input-group mb-3" v-for="(keyword, index) in keywords" :key="index" v-show="keyword.regexp">
              <input type="text" class="form-control" v-model="keyword.word" @blur="checkKeywod(keyword)" />
              <a href="#" class="input-group-append" @click.prevent="del(index)">
                <span class="input-group-text">删除</span>
              </a>
            </div>
            <button class="btn btn-outline-primary btn-sm" @click="add(true)" type="button">添加模糊匹配关键词</button>
          </div>
        </div>
      </div>

      <textarea name="wechat[rule]" v-html="rule" hidden></textarea>
      <textarea name="wechat[keywords]" v-html="keywords" hidden></textarea>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    rid: { type: Number, default: 0 },
    required: { type: Boolean, default: true }
  },
  data() {
    return {
      rule: {
        wechat_id: 0,
        title: ''
      },
      keywords: [],
      wechats: []
    }
  },
  mounted() {
    this.getWechats()
    this.getRule()
  },
  methods: {
    async getWechats() {
      this.wechats = await this.axios.get(`wechat/rule/wechat`)
    },
    async checkKeywod(keyword) {
      const response = await this.axios.post(`wechat/keyword/check`, {
        keyword
      })
      this.$set(keyword, 'has', response.has)
      if (response.has) {
        this.$message.error(`关键词 「${keyword.word}」 已经被使用`)
      }
    },
    async getRule() {
      if (!this.rid) return
      const response = await this.axios.get(`wechat/rule/${this.rid}`)
      this.rule = response.rule
      this.keywords = response.keywords
    },
    del(index) {
      this.$confirm('确定删除吗', '温馨提示').then(() => {
        this.keywords.splice(index, 1)
      })
    },
    add(regexp) {
      this.keywords.push({ word: '', regexp })
    }
  }
}
</script>

<style lang="scss" scoped></style>
