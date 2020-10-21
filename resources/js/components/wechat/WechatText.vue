<template>
  <div class="card">
    <div class="card-header">回复内容</div>
    <div class="card-body">
      <div class="card mb-2" v-for="(content, index) in text.contents" :key="index">
        <div class="card-body">
          <div class="form-group">
            <textarea class="form-control" v-model="text.contents[index]"></textarea>
          </div>
        </div>
        <div class="card-footer text-muted">
          <button
            class="btn btn-outline-secondary btn-sm"
            type="button"
            @click.prevent="del(index)"
          >删除</button>
        </div>
      </div>
    </div>

    <textarea name="contents" v-html="text.contents" hidden></textarea>

    <div class="card-footer text-muted">
      <button class="btn btn-outline-primary btn-sm" type="button" @click.prevent="add">添加回复</button>
    </div>
  </div>
</template>


<script>
export default {
  props: {
    id: { type: Number },
  },
  data() {
    return {
      text: { contents: [] },
    }
  },
  mounted() {
    if (this.id) {
      this.get()
    }
  },
  methods: {
    async get() {
      const response = await this.axios.get(`wechat/text/${this.id}`)
      this.text = response
    },
    del(index) {
      this.$confirm('确定删除吗？', '温馨提示').then(() => {
        this.text.contents.splice(index, 1)
      })
    },
    add() {
      this.text.contents.push('')
    },
  },
}
</script>
<style lang="stylus" scoped></style>
