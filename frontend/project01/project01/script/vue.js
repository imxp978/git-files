<script>
Vue.createApp({
  data () {
    return {
      categoryList: [
        {id:1, title:"plate", image:"images/product_images/001.webp"},
        {id:2, title:"bowl", image:"images/product_images/002.jpg"},
        {id:3, title:"cooker", image:"images/product_images/003.jpg"},
        {id:4, title:"pot", image:"images/product_images/001.webp"},
        {id:5, title:"good one too", image:"images/product_images/004.jpg"},
        {id:6, title:"good one 333", image:"images/product_images/002.jpg"},
        {id:7, title:"good one 333", image:"images/product_images/003.jpg"},
        {id:8, title:"good one 111", image:"images/product_images/001.webp"},
        {id:9, title:"good one too", image:"images/product_images/002.jpg"},

      ],

      reviewList: [
        {id:1, title:"user1", content:"this is good 1", image:"images/user_images/person_1.jpg",},
        {id:2, title:"user2", content:"this is good 2", image:"images/user_images/person_2.jpg",},
        {id:3, title:"user3", content:"this is good 3", image:"images/user_images/person_3.jpg",},
        {id:4, title:"user4", content:"this is good 4", image:"images/user_images/person_4.jpg",},
      ]

    }
  },
  methods: {


  },
  mounted () {

  }

}).mount('#app')

</script>