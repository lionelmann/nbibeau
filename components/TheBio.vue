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
  column-count: 1;
  column-gap: 50px;
  font-size: 1.2rem;
}

@media (min-width: 600px) {
  .bio {
    column-count: 2;
  }
}

.bio p {
  margin-bottom: 15px;
}

.bio p:first-child::first-letter {
  color: #735c4f;
  padding: 0 0.6rem 0 0;
  margin: 0 0.3rem 0 0;
  font-family: "Bebas Neue", cursive;
  font-weight: bold;
  font-size: 6rem;
  float: left;
  line-height: 1.05;
}
</style>
