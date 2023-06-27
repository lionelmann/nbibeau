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
  padding: 60px;
}

.bio {
  column-count: 1;
  column-gap: 50px;
  font-size: 1.3rem;
}

.nuxt-content {
  max-width: 800px;
  margin: 0 auto;
}

/*@media (min-width: 600px) {
  .bio {
    max-width: 600px;
    column-count: 1;
  }
}*/

.bio p {
  margin-bottom: 15px;
}

.bio p:first-child::first-letter {
  color: #735c4f;
  padding: 0 0.6rem 0 0;
  margin: 0 13px 0 0;
  font-family: "Bebas Neue", cursive;
  font-weight: bold;
  font-size: 5rem;
  float: left;
  line-height: 1;
}
</style>
