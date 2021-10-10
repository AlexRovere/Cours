<template>
  <div>
    <section class="test">
      <Test message="Bienvenue sur mon panier dynamique"></Test>
    </section>
    <section class="panier">
      <p>Total d'articles : {{ totalQuantity }}</p>
      <p>Prix : {{ totalPrice }} €</p>
      <p class="alert" v-if="totalPrice > 100">
        Merci de nous contacter pour votre commande
      </p>
    </section>
    <section class="liste">
      <div class="container">
        <Liste
          v-for="item in product"
          :productName="item.name"
          :productDescription="item.description"
          :productPrice="item.price"
          :productUrl="item.url"
          :key="item.name"
          :calculateProductQuantity="calculateProductQuantity"
          :calculateProductPrice="calculateProductPrice"
        ></Liste>
      </div>
      <button class="button-validate">Valider la commande</button>
    </section>
  </div>
</template>

<script>
import Liste from "./components/Liste.vue";
import Test from "./components/Test.vue";

export default {
  name: "App",
  components: {
    Liste,
    Test,
  },
  data: function () {
    return {
      totalQuantity: 0,
      totalPrice: 0,
      product: [
        {
          name: "Steak",
          description: "Viande rouge",
          price: 10,
          url: "img/viande-rouge.jpg",
        },
        {
          name: "Poulet",
          description: "Viande blanche",
          price: 25,
          url: "img/viande-blanche.jpg",
        },
        {
          name: "Gibier",
          description: "Viande de gibier",
          price: 50,
          url: "img/viande-gibier.jpg",
        },
      ],
    };
  },
  methods: {
    calculateProductQuantity(amount) {
      return (this.totalQuantity += amount);
    },
    calculateProductPrice(quantity, price) {
      return (this.totalPrice += parseInt(quantity) * price);
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  background-color: aliceblue;
}
.container {
  display: flex;
  flex-direction: row;
  width: 50vw;
  margin: auto;
  justify-content: space-around;
}
.alert {
  color: red;
}
.button-validate {
  background-color: green;
  width: 100;
  height: 50px;
  margin-top: 5vh;
}
</style>
