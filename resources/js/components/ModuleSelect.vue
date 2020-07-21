<template>
    <div>
        <el-table ref="multipleTable" :data="tableData" class="table-border" tooltip-effect="dark" style="width: 100%" @selection-change="handleSelectionChange">
            <el-table-column type="selection" width="55"></el-table-column>
            <el-table-column prop="title" label="Logo" width="100">
                <template slot-scope="scope">
                    <img :src="scope.row.preview" style="width:38px;" class="rounded" />
                </template>
            </el-table-column>
            <el-table-column prop="title" label="模块名称"  width="300"></el-table-column>
            <el-table-column prop="name" label="模块标识" width="200">
            </el-table-column>
            <el-table-column prop="version" label="版本号" width="120">
            </el-table-column>
            <el-table-column prop="description" label="描述"></el-table-column>
        </el-table>
        <input type="hidden" name="modules[]" v-for="module in multipleSelection" :key="module.id" :value="module.id">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tableData: window.modules,
                selected: window.selected,
                multipleSelection: []
            }
        },
        mounted(){
            this.tableData.map(module=>{
                if(this.selected.includes(module.id)){
                    this.$refs.multipleTable.toggleRowSelection(module);
                }
            })
        },
        methods: {
            handleSelectionChange(val) {
                this.multipleSelection = val;
            }
        }
    }
</script>
