<template>
    <div class="bg-white flex-fill d-flex flex-column">
        <div class="flex-fill p-1 messages">
            <div class="" v-for="(message, index) in messages" :key="index">
                <a href="#" class="text-secondary">{{ message.user.nickname }}</a>
                <span>{{ message.content }}</span>
            </div>
        </div>
        <div v-if="isLogin">
            <input type="text" v-model="content" class="form-control rounded-0" placeholder="聊个天呗..." @keyup.enter="send" />
        </div>
        <div class="p-3 text-center border-top" v-if="!isLogin">
            <a href="/login" class="btn btn-sm btn-info">请先登录后操作</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                client_id: '',
                messages: [],
                content: '',
                isLogin: window.user.id*1 > 0
            }
        },
        mounted() {
            let socket = new WebSocket('wss://wxnet.vip:8282')
            socket.onmessage = this.message
        },
        methods: {
            message({ data }) {
                data = JSON.parse(data)
                switch (data.type) {
                    case 'init':
                        this.client_id = data.client_id
                        this.axios.get('/Edu/chat/init', this.$data)
                        break
                    default:
                        this.messages.push(data)
                        this.messages = this.messages
                            .reverse()
                            .splice(0, 50)
                            .reverse()

                        this.$nextTick(_ => {
                            document.querySelector('.messages').scrollTo({ top: 99999 })
                        })
                }
            },
            send() {
                if (this.content.trim()) {
                    this.axios.post('/Edu/chat/send', { ...this.$data })
                    this.content = ''
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .messages {
        height: 200px;
        overflow-y: auto;
    }
    input {
        border-top: solid 2px #333;
    }
</style>
