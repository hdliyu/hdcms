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
            <div class="card-body text-secondary pb-5"><!---->
                <div class="markdown">{{comment.content}}</div>
            </div>
            <div class="card-footer text-muted bg-white small">
                # {{index+1}}
                <a href="#" class="d-inline-block mr-2 ml-2"><i aria-hidden="true" class="fa fa-reply"></i> 回复
                </a> <!----></div>
        </div>
        <div id="commentForm">
            <div class="card">
                <div class="card-header"><!----> <span>发表评论</span></div>
                <editor name="content" :content.sync="content" ref="editor"></editor>
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
            let {comments} = await this.$axios.get(`/Edu/${this.model}/${this.id}/comment`)
            this.comments = comments
        },
        data() {
            return {
                content: '',
                comments: [],
            }
        },
        methods: {
            async submit() {
                let content = this.content;
                if(content.length<10){
                    this.$message.error('评论内容不能少于10个字')
                    return
                }
                let {comment} = await this.$axios.post(`/Edu/${this.model}/${this.id}/comment`,this.$data)
                this.comments.push(comment)
                this.$refs.editor.setEditorValue();
            }
        }
    }
</script>
<style>
    .tui-editor-defaultUI {
        border: none !important;
    }
</style>
