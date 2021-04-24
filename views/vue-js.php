<br><br>

<h2>Vue Practice</h2>
<div id="vue_app">
  <hr>
  {{counter}}
  <button @click="startCounter">Start</button>
  <button @click="stopCounter">Stop</button>
  <button @click="resetCounter">Reset</button>
  <hr>

  <h2>{{message}}</h2>
  Start Typing: <input type="text" v-model="message">
  <hr>

  <h2>{{product}}</h2>
  <a href="#" class="btn white">Cart {{cart}}</a>
  <div class="product-box">
    <img :src="product_img" alt="" width="400">
    <div class="color_btns">
      Choose your favourite color:
      <button @click="changeColor('black')" class="btn black">Black</button>
      <button @click="changeColor('white')" class="btn white">White</button>
      <button @click="changeColor('red')" class="btn red">Red</button>
    </div>
  </div>
  <input type="number" name="quantity" value="1" id="quantity" min="1" max="99999999">
  <button @click="cart += 1" class="btn white">Add to cart</button>
</div>