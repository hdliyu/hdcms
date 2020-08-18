<template>
    <div class="comment">
        <div v-for="(comment,index) in comments" :id="'comment-'+comment.id" class="card shadow-sm mb-2">
            <div class="card-header bg-white d-flex justify-content-start"><img :src="comment.user.avatar||''" class="rounded mr-3 w35 h35">
                <div class="flex-fill">
                    <div class="text-secondary"><a href="">{{comment.user.name||''}}</a></div>
                    <span class="small text-black-50"><i aria-hidden="true" class="fa fa-clock-o"></i>
          {{comment.created_at}}
        </span></div>
            </div>
            <div class="card-body text-secondary pb-5">
                <a href="#" v-if="comment.reply_user">@ {{ comment.reply_user.name }}</a>
                <div class="markdown" v-html="comment.html" v-highligh></div>
            </div>
            <div class="card-footer text-muted bg-white small">
                # {{index+1}}
                <a href="#commentForm" class="d-inline-block mr-2 ml-2" @click="reply_user = comment.user">
                    <i aria-hidden="true" class="fa fa-reply"></i> 回复
                </a>
                <a href="#" class="d-inline-block mr-2 ml-2" @click.prevent="del(comment,index)" v-if="isAdmin || (user && user.id==comment.user_id)">
                    <i aria-hidden="true" class="fa fa-times-circle"></i> 删除
                </a>
            </div>
        </div>
        <div id="commentForm">
            <div class="card">
                <div class="card-header">
                    <div  v-if="reply_user.id">
                    <span>回复 {{reply_user.name}} </span>
                    <a href="#" @click.prevent="reply_user={}"><i class="fa fa-times-circle"></i></a>
                    </div>
                    <span v-else>发表评论</span>
                </div>
                <editor name="content" :content.sync="content"  initialEditType="wysiwyg" ref="editor"></editor>
                <div class="card-footer text-muted" @click="submit">
                    <button type="button" class="btn btn-primary btn-sm d-inline-block">保存</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Editor from "./Editor";
    export default {
        components:{Editor},
        props: {
            model: {type: String, required: true},
            id: {required: true},
        },
        async mounted() {
            let {data:comments,meta:{is_admin,user}}= await this.$axios.get(`/Edu/${this.model}/${this.id}/comment`)
            this.comments = comments
            this.isAdmin = is_admin
            this.user = user
        },
        data() {
            return {
                content: '',
                comments: [],
                reply_user: {},
                isAdmin: false,
                user: {},
            }
        },
        methods: {
            async submit() {
                if(this.content.length<10){
                    this.$message.error('评论内容不能少于10个字')
                    return
                }
                let content = this.content
                let post = {content}
                if(this.reply_user.id)  post.reply_user_id = this.reply_user.id
                let {comment} = await this.$axios.post(`/Edu/${this.model}/${this.id}/comment`,post)
                this.comments.push(comment)
                this.$refs.editor.reset()
                this.reply_user = {}
            },
            del(comment, index) {
                this.$confirm('确定删除吗?', '温馨提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning',
                })
                    .then(async () => {
                        const url = `Edu/${this.model}/${this.id}/comment/${comment.id}`
                        await this.axios.delete(url)
                        this.comments.splice(index, 1)
                    })
                    .catch(() => {})
            },
        }
    }
</script>
<style>
    .tui-editor-defaultUI {
        border: none !important;
    }
</style>
