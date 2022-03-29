<template>
  <div>
    <!--<header>
      <section>
        <h1>Nathalie Bibeau is an award-winning filmmaker.</h1>
      </section>
    </header>-->

    <header>
      <div class="hero"></div>
      <div>
        <h1 class="headline">Nathalie Bibeau <br />award-winning filmmaker.</h1>
      </div>
    </header>
  </div>
</template>

<script>
export default {};
</script>

<style lang="css" scoped>
header {
  display: grid;
  grid-template-columns: 1fr 1fr;
  height: 70vh;
  background-color: #37474f;
  background-color: #735c4f;
  color: #f2cf63;
}
header div {
  display: grid;
  align-items: center;
  justify-content: center;
}
.hero {
  background-image: url("~static/hero.jpg");
  background-position: center;
  background-size: cover;
}
.headline {
  /*border: 4px solid #f2cf63;*/
  padding: 4rem;
  color: #f2cf63;
}
</style>
