<template>
  <section>
    <h2>{{ message }}</h2>
  </section>
</template>

<script>
export default {
  name: "Test",
  props: {
    message: String,
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
