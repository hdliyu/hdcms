<template>
    <div>
        <div class="input-group mb-3">
            <input
                type="text"
                class="form-control"
                placeholder="请输入课程标题或编号"
                v-model="w"
                @keyup.enter="search"
            />
            <div class="input-group-append hand" @click.prevent="search">
                <span class="input-group-text">搜索</span>
            </div>
        </div>
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
                <th width="80"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="lesson in lessons" :key="lesson.id">
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
                        <a href="#" class="btn btn-info btn-sm" @click.prevent="$emit('add',lesson)">添加</a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                lessons: [],
                w: ''
            }
        },
        methods: {
            async search() {
                const response = await this.axios.post(`/Edu/admin/system-search`, { w: this.w })
                this.lessons = response
            }
        }
    }
</script>
<style>
</style>
