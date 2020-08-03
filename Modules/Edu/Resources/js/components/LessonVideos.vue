<template>
    <div class="card mt-3">
        <div class="card-header">视频管理</div>
        <div class="card-body">
            <draggable v-model="videos" class="row" @start="drag = true" @end="drag = false">
                <div class="drag col-6 col-sm-3 mb-3" v-for="(video, index) in videos" :key="index">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="请输入视频标题" v-model="video.title" />
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="请输入视频地址" v-model="video.path" />
                                <a href="#" class="input-group-append" @click.prevent="del(index)">
                                    <span class="input-group-text" id="basic-addon2">删除</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </draggable>
        </div>
        <div class="card-footer text-muted">
            <button type="button" class="btn btn-sm btn-info" @click.prevent="add">添加视频</button>
        </div>
        <textarea hidden v-html="videos" name="videos"></textarea>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        components: {
            draggable
        },
        data() {
            return {
                videos: window.videos
            }
        },
        methods: {
            add() {
                this.videos.push({ id: 0, title: '', path: '' })
            },
            del(index) {
                this.videos.splice(index, 1)
            }
        }
    }
</script>

<style scoped>
    .drag:active{
        cursor: move;
    }
</style>
