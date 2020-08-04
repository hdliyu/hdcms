<template>
    <div class="card">
        <div class="card-header">课程列表</div>
        <div class="card-body">
            <table class="table mt-3 table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>课程名称</th>
                    <th>上架</th>
                    <th>点赞数</th>
                    <th>收藏数</th>
                    <th>视频数量</th>
                    <th>发布时间</th>
                    <th width="80">操作</th>
                </tr>
                </thead>
                <draggable v-model="lessons" @start="drag = true" @end="drag = false" element="tbody">
                    <tr v-for="(lesson,index) in lessons" :key="lesson.id" class="drag">
                        <td>{{ lesson.id }}</td>
                        <td>{{lesson.title}}</td>
                        <td>
                            <i class="fas fa-check" v-if="lesson.status"></i>
                        </td>
                        <td>{{ lesson.favour_count }}</td>
                        <td>{{ lesson.favorite_count }}</td>
                        <td>{{ lesson.video_num }}</td>
                        <td>{{ lesson.created_at }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="#" class="btn btn-info btn-sm" @click.prevent="del(index)">移除</a>
                            </div>
                        </td>
                    </tr>
                </draggable>
            </table>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-info btn-sm" @click.prevent="dialogVisible=true">课程选择</button>
        </div>

        <el-dialog title="课程选择" :visible.sync="dialogVisible" width="60%" :close-on-click-modal="false">
            <lesson-search @add="add"></lesson-search>
        </el-dialog>

        <input hidden name="lessons" v-model="ids" />
    </div>
</template>

<script>
    import LessonSearch from './LessonSearch'
    import draggable from 'vuedraggable'
    export default {
        components: { LessonSearch, draggable },
        data() {
            return {
                dialogVisible: false,
                lessons: window.lessons || []
            }
        },
        computed: {
            ids() {
                return this.lessons.map(lesson => lesson.id)
            }
        },
        methods: {
            add(lesson) {
                this.lessons.push(lesson)
                this.lessons = _.uniqBy(this.lessons, 'id')
            },
            del(index) {
                this.lessons.splice(index, 1)
            }
        }
    }
</script>

<style></style>
