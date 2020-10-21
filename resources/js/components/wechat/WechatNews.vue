<template>
  <div class="d-flex">
    <div class="view">
      <draggable v-model="news" group="people" @start="drag = true" @end="drag = false" class="wechat-news">
        <div v-for="(article, index) in news" :key="index" @click="current = article" :class="{ active: current == article }">
          <img :src="article.picurl || '/images/nopic.jpg'" />
          <h5>{{ article.title || '图文消息标题' }}</h5>
        </div>
      </draggable>
      <div class="d-flex justify-content-center align-items-center p-2 text-secondary" style="cursor: pointer" @click.prevent="add" v-if="news.length < 5">
        <i class="fas fa-plus-circle" style="font-size: 2rem"></i>
      </div>
    </div>
    <div class="edit flex-fill border ml-3 p-3 shadow-sm d-flex flex-column">
      <div class="flex-fill">
        <div class="form-group">
          <label>标题</label>
          <input type="text" class="form-control" v-model="current.title" />
        </div>

        <image-single :image.sync="current.picurl"></image-single>
        <div class="form-group">
          <label>链接</label>
          <input type="text" class="form-control" v-model="current.url" />
        </div>
      </div>
      <div>
        <button class="btn btn-outline-danger btn-sm" type="button" @click.prevent="del">删除图文消息</button>
      </div>
    </div>
    <textarea name="contents" v-html="news" hidden></textarea>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
const field = {
  title: '',
  description: '',
  picurl: '',
  url: 'https:/',
}
export default {
  components: {
    draggable,
  },
  props: {
    id: { type: Number, default: 0 },
  },
  data() {
    return {
      news: [Object.assign({}, field)],
      current: {},
    }
  },
  mounted() {
    this.get()
    this.initCurrent()
  },
  methods: {
    async get() {
      if (this.id) {
        const response = await this.axios.get(`wechat/news/${this.id}`)
        this.news = response
        this.initCurrent()
      }
    },
    initCurrent() {
      if (this.news.length) this.current = this.news[0]
    },
    add() {
      this.news.push(Object.assign({}, field))
    },
    del() {
      this.$confirm('确定删除消息吗？', '温馨提示').then(() => {
        this.news.map((article, index) => {
          if (article == this.current) {
            this.news.splice(index, 1)
            this.initCurrent
          }
        })
      })
    },
  },
}
</script>
<style lang="scss" scoped>
.view {
  width: 350px;
  border: solid 1px #dcdcdc;
}
</style>
