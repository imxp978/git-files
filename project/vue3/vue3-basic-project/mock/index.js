import Mock from "mockjs"
// 内存模拟数据
const list = []
for (let i = 0; i < 10; i++) {
  // arr.push({
  //   id: Mock.mock("@id"),
  //   name: Mock.mock("@cname"),
  //   place: Mock.mock("@county(true)"),
  // })
  list.push(Mock.mock({
    id:'@id',
    name:'@cname',
    sex:'@integer(0,1)',
    birthday:'@date',
    img:'@image(50x50, #FF6600, #fff, png, header)',
    role:'@pick(["管理员","普通用户"])',
    address:'@county(true)',
  }))
}


export default [
  {
    url: "/users",
    method: "get",
    response: () => {
      return {
        code:200,
        data:list
      }
    },
  },
  {
    url: "/users/:id",
    method: "delete",
    response: (req) => {
      const index = list.findIndex((item) => {
        return item.id === req.query.id
      })
      if (index > -1) {
        list.splice(index, 1)
        return { code: 200 }
      } else {
        return { code: 201 }
      }
    },
  },
  {
    url: "/users",
    method: "put",
    response: ({ body }) => {
      const item = list.find((item) => item.id === body.id)
      if (item) {
        for(const key in item){
          item[key] = body[key]
        }
        return { code: 200 }
      } else {
        return { code: 201 }
      }
    },
  },
]
