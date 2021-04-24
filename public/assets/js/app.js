var count_interval;
const HelloVue = {
  data() {
    return {
      counter: 0,
      message: 'This is the Message.',
      product: 'Caps',
      product_img: '/assets/images/cap-white.png',
      cart: 0,
    }
  },

  methods: {
    startCounter(){
      count_interval = setInterval(() => {
        this.counter++;
      },1000);
    },

    stopCounter(){
      clearInterval(count_interval);
    },

    resetCounter(){
      clearInterval(count_interval);
      this.counter = 0;
    },

    changeColor(color){
      this.product_img =  '/assets/images/cap-'+color+'.png';
    }
  }
}

Vue.createApp(HelloVue).mount('#vue_app')