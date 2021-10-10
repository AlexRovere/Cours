<template>
  <section>
    <div class="flex-row">
      <h2>{{ productName }}</h2>
      <p>{{ productDescription }}</p>
      <img :src="productUrl" />
      <p>Prix : {{ productPrice }} €</p>

      <label for="quantity">Quantité : {{ productQuantity }} </label>
      <input v-model.number="productQuantity" type="number" />
      <button
        @click="
          calculateProductQuantity(productQuantity),
            calculateProductPrice(productQuantity, productPrice)
        "
        id="quantitySelected"
        type="number"
      >
        Ajouter
      </button>
    </div>
  </section>
</template>

<script>
export default {
  name: "Liste",
  data() {
    return {
      productQuantity: 0,
    };
  },
  props: {
    productName: String,
    productPrice: Number,
    productDescription: String,
    productUrl: String,
    calculateProductQuantity: Function,
    calculateProductPrice: Function,
  },
  //   props: [
  //     "productName",
  //     "productPrice",
  //     "productDescription",
  //     "productUrl",
  //     "productQuantity",
  //     "calculateProductQuantity",
  //   ],
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.flex-row {
  display: flex;
  flex-direction: column;
}
* {
  text-align: center;
}
</style>
