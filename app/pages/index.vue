<template>
<main>
  <header>
    <div class="hero">
        <div class="hero-inner">
           <h1>Nathalie Bibeau</h1>
        </div>
    </div>
  </header>
  <section>
    <div class="grid" v-for="work in works" :key="work.id">
      <div>
        <h2>{{work.title.rendered}}</h2><br>
        <p>{{work.meta_box['_works_description']}}</p>
        <p><a :href="work.meta_box['_works_link']">View</a></p>
      </div>
      <div>
        <img src="~static/hero.jpg">
      </div>
    </div>
  </section>
  <footer>
    Copyright 2019
  </footer>
</main>
</template>

<script>
export default {
  async asyncData({ $axios }) {
    let works = await $axios.$get('http://nbibeau.test/cms/wp-json/wp/v2/work/?_embed')
    return { works }
  },
  date(){
    return{
      backgroundUrl:require('~/static/hero.jpg') 
    }
  }
}
</script>

<style scoped>

section {
  max-width: 1280px;
  margin: 0 auto;
}

.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 2rem;
  margin: 2rem;
}

.hero {
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: white;
  background-image: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('~static/hero.jpg');
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
</style>