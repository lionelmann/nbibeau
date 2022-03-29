<template>
  <div class="bio">
    <nuxt-content :document="about"></nuxt-content>
  </div>
</template>

<script>
export default {
  data: () => ({
    about: [],
  }),
  async fetch() {
    this.about = await this.$content("about").fetch(); //Your are the best daddy ever!!!!!
  },
};
</script>

<style lang="css">
.bio {
  background-color: #f2cf63;
  padding: 40px;
}

.bio {
  column-count: 2;
  column-gap: 50px;
  font-size: 1.1rem;
}

.bio p {
  margin-bottom: 10px;
}

.bio p:first-child::first-letter {
  color: #37474f;
  color: #735c4f;
  padding: 0 0.6rem 0 0;
  margin: 0 0.3rem 0 0;
  font-family: "Bebas Neue", cursive;
  font-size: 7rem;
  float: left;
  line-height: 0.9;
}
</style>
