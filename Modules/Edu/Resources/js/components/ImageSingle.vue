<template>
    <div>
        <el-upload
            :headers="headers"
            class="avatar-uploader"
            :action="action"
            :show-file-list="false"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload">
            <img v-if="imageUrl" :src="imageUrl" class="avatar">
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
        </el-upload>
        <input type="hidden" :name="name" v-model="imageUrl">
    </div>
</template>
<style>
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        background: #f5f5f5;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }
    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }
    .avatar {
        /*width: 178px;*/
        height: 150px;
        display: block;
    }
</style>
<script>
    export default {
        props:{
            action:{ required:true},
            name:{required:true},
            image:{required:true,default:''}
        },
        data() {
            return {
                imageUrl: this.image,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
        },
        methods: {
            handleAvatarSuccess(res, file) {
                console.log(res,file);
                // this.imageUrl = URL.createObjectURL(file.raw);
                this.imageUrl = res.path
            },
            beforeAvatarUpload(file) {
                const allowTypes = ['image/jpeg','image/png'];
                const status = allowTypes.includes(file.type);
                if (!status) {
                    this.$message.error('上传头像图片格式错误!');
                }
                const isLt2M = file.size / 1024 / 1024 < 2;
                if (!isLt2M) {
                    this.$message.error('上传头像图片大小不能超过 2MB!');
                }
                return status && isLt2M;
            }
        }
    }
</script>
