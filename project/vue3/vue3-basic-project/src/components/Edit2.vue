<template>
  <el-dialog :visible.sync ="dialogVisible" title="编辑" width="500px">
    <el-form label-width="50px">
      <el-form-item label="姓名">
        <el-input placeholder="请输入姓名" v-model="form.name" />
      </el-form-item>
      <el-form-item label="性别">
        <el-select v-model="form.sex" placeholder="请选择性别">
          <el-option
              v-for="item in sexList"
              :key="item.value"
              :label="item.label"
              :value="item.value">
          </el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="籍贯">
        <el-input placeholder="请输入籍贯" v-model="form.address" />
      </el-form-item>

      <el-form-item label="生日">
        <el-date-picker
            v-model="form.birthday"
            type="date"
            value-format="yyyy-MM-dd"
            placeholder="选择日期">
        </el-date-picker>
      </el-form-item>
    </el-form>
    <template #footer>
      <span class="dialog-footer">
        <el-button @click="dialogVisible = false">取消</el-button>
        <el-button type="primary" @click="onUpdate">确认</el-button>
      </span>
    </template>
  </el-dialog>

</template>

<script>
import axios from "axios";

export default {
  name: "Edit2",
  data(){
    return{
      dialogVisible:false,
      sexList:[{value:0,label:'男'},{value:1,label: '女'}],
      form:{
        id:'',
        img:'',
        name:'',
        sex:'',
        birthday:'',
        role:'',
        address:'',
      }
    }
  },
  methods:{
    open(row){
      this.dialogVisible = true;
      this.form.id = row.id;
      this.form.img = row.img;
      this.form.name = row.name;
      this.form.sex = row.sex;
      this.form.birthday = row.birthday;
      this.form.role = row.role;
      this.form.address = row.address;
    },
    async onUpdate(){
      await axios.put("/users",this.form);
      this.dialogVisible = false;
      this.$emit("refresh");
    }
  }
}
</script>

<style scoped>

</style>