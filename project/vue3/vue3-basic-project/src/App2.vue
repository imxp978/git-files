<template>
  <div>
    <div class="app">
      <el-table :data="users" border stripe>
        <el-table-column label="ID" prop="id" width="200"></el-table-column>
        <el-table-column label="头像" width="80">
          <template v-slot="scope">
            <img :src="scope.row.img"/>
          </template>
        </el-table-column>
        <el-table-column label="姓名" prop="name" width="100"></el-table-column>
        <el-table-column label="性别" width="60">
          <template v-slot="scope">
            {{ scope.row.sex === 0 ? '男' : '女' }}
          </template>
        </el-table-column>
        <el-table-column label="生日" prop="birthday" width="150"></el-table-column>
        <el-table-column label="角色" prop="role" width="100"></el-table-column>
        <el-table-column label="地址" prop="address"></el-table-column>
        <el-table-column label="操作" width="200">
          <template v-slot="scope">
            <el-button type="primary" size="mini" @click="openEdit(scope.row)">编辑</el-button>
            <el-button type="danger" size="mini" @click="delUser(scope.row.id)">删除</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <Edit ref="editRef" @refresh="handleRefresh"></Edit>
  </div>
</template>
<script>
import axios from "axios";
import Edit from "@/components/Edit.vue";
export default {
  name: 'App2',
  components: {Edit},
  data() {
    return {
      users:[]
    }
  },
  methods: {
    async getList(){
      const res = await axios.get("/users");
      this.users = res.data.data;
      console.log(this.users);
    },
    async delUser(id){
      this.$confirm('此操作将永久删除用户数据, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(async () => {
        await axios.delete(`/users/${id}`);
        this.getList();
        this.$message({
          type: 'success',
          message: '删除成功!'
        });
      }).catch(() => {
        this.$message({
          type: 'info',
          message: '已取消删除'
        });
      });
    },
    openEdit(row){
      this.$refs.editRef.open(row);
    },
    handleRefresh(){
      this.getList();
      this.$message({
        showClose: true,
        message: '更新用户信息成功',
        type: 'success'
      });
    }
  },
  mounted() {
    this.getList();
  },

}
</script>

<style>
.app {
  width: 1200px;
  margin: 100px auto 0;
}
</style>
