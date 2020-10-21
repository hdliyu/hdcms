<template>
  <div>
    <div>
      <wechat-list :id.sync="wechat_id" v-if="!id"></wechat-list>
    </div>
    <div class="d-flex" v-if="wechat_id">
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

          <div class="form-group">
            <label>作者</label>
            <input type="text" class="form-control" v-model="current.author" />
          </div>
          <div class="form-group">
            <label>原文地址</label>
            <input type="text" class="form-control" v-model="current.content_source_url" />
          </div>
          <div class="form-group">
            <label>摘要</label>
            <input type="text" class="form-control" v-model="current.digest" />
          </div>
          <div class="form-group">
            <label>是否打开评论</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="current.need_open_comment" value="1" id="need_open_comment1" />
              <label class="form-check-label" for="need_open_comment1">打开</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="current.need_open_comment" value="0" id="need_open_comment0" />
              <label class="form-check-label" for="need_open_comment0">不打开</label>
            </div>
          </div>

          <div class="form-group">
            <label>是否粉丝才可评论</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="current.only_fans_can_comment" value="1" id="only_fans_can_comment1" />
              <label class="form-check-label" for="only_fans_can_comment1">显示</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="current.only_fans_can_comment" value="0" id="only_fans_can_comment0" />
              <label class="form-check-label" for="only_fans_can_comment0">不显示</label>
            </div>
          </div>
          <div class="form-group">
            <label>是否显示封面</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="current.show_cover_pic" value="1" id="show_cover_pic1" />
              <label class="form-check-label" for="show_cover_pic1">显示</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" v-model="current.show_cover_pic" value="0" id="show_cover_pic0" />
              <label class="form-check-label" for="show_cover_pic0">不显示</label>
            </div>
          </div>

          <image-single :image.sync="current.picurl"></image-single>

          <wang-editor :value.sync="current.content" :uploadImageAction="`/common/wangEditor/newsMaterialImage/` + wechat_id"></wang-editor>
        </div>
        <div class="mt-3">
          <button class="btn btn-outline-danger btn-sm" type="button" @click.prevent="del">删除图文消息</button>
        </div>
      </div>
      <textarea name="contents" v-html="news" hidden></textarea>
    </div>
    <button class="btn btn-primary mt-3" @click.prevent="submit">保存提交</button>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
const field = { title: '', thumb_media_id: '', author: '', digest: '', picurl: '', show_cover_pic: 1, content: '', content_source_url: '', need_open_comment: 0, only_fans_can_comment: 0 }

export default {
  components: {
    draggable,
  },
  props: {
    id: { type: Number, default: 0 },
  },
  data() {
    return {
      wechat_id: 0,
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
        const response = await this.axios.get(`wechat/material/${this.id}`)
        this.news = response.content
        this.wechat_id = response.wechat_id
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
      if (this.news.length == 1) {
        return this.$message.error('最少要有一个图文内容')
      }
      this.$confirm('确定删除消息吗？', '温馨提示').then(() => {
        this.news.map((article, index) => {
          if (article == this.current) {
            this.news.splice(index, 1)
            this.initCurrent
          }
        })
      })
    },
    async submit() {
      const data = { content: this.news, wechat_id: this.wechat_id }
      if (this.id) {
        const response = await this.axios.put(`wechat/material/${this.id}?type=news`, data)
      } else {
        const response = await this.axios.post(`wechat/material?type=news`, data)
      }

      location.href = '/wechat/material?type=news'
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
