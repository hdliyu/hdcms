<template>
    <div class="card mt-3">
        <div class="card-header">关键词设置</div>
        <div class="card-body">
            <div class="form-group">
                <label>规则名称</label>
                <input type="text" class="form-control" v-model="rule.title" required />
            </div>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a
                        class="nav-item nav-link active"
                        id="nav-home-tab"
                        data-toggle="tab"
                        href="#nav-home"
                        role="tab"
                        aria-controls="nav-home"
                        aria-selected="true"
                    >完整匹配</a>
                    <a
                        class="nav-item nav-link"
                        id="nav-profile-tab"
                        data-toggle="tab"
                        href="#nav-profile"
                        role="tab"
                        aria-controls="nav-profile"
                        aria-selected="false"
                    >模糊匹配</a>
                </div>
            </nav>
            <div class="tab-content border border-top-0 p-3" id="nav-tabContent">
                <div
                    class="tab-pane fade show active"
                    id="nav-home"
                    role="tabpanel"
                    aria-labelledby="nav-home-tab"
                >
                    <div
                        class="input-group mb-3"
                        v-for="(keyword,index) in keywords"
                        :key="index"
                        v-show="!keyword.regexp"
                    >
                        <input type="text" class="form-control" v-model="keyword.word" />
                        <a href="#" class="input-group-append" @click.prevent="del(index)">
                            <span class="input-group-text">删除</span>
                        </a>
                    </div>
                    <button class="btn btn-outline-primary btn-sm" type="button" @click="add(false)">添加关键词</button>
                </div>

                <div
                    class="tab-pane fade"
                    id="nav-profile"
                    role="tabpanel"
                    aria-labelledby="nav-profile-tab"
                >
                    <div
                        class="input-group mb-3"
                        v-for="(keyword,index) in keywords"
                        :key="index"
                        v-show="keyword.regexp"
                    >
                        <input type="text" class="form-control" v-model="keyword.word" />
                        <a href="#" class="input-group-append" @click.prevent="del(index)">
                            <span class="input-group-text">删除</span>
                        </a>
                    </div>
                    <button class="btn btn-outline-primary btn-sm" @click="add(true)" type="button">添加关键词</button>
                </div>
            </div>
        </div>

        <textarea name="wechat[rule]" v-html="rule" hidden></textarea>
        <textarea name="wechat[keywords]" v-html="keywords" hidden></textarea>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                rule: {
                    title: '',
                },
                keywords: [
                    { word: 'a', regexp: false },
                    { word: 'b', regexp: true },
                ],
            }
        },
        methods: {
            del(index) {
                this.$confirm('确定删除吗', '温馨提示').then(() => {
                    this.keywords.splice(index, 1)
                })
            },
            add(regexp) {
                this.keywords.push({ word: '', regexp })
            },
        },
    }
</script>

<style lang="scss" scoped>
</style>
