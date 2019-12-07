<template>
    <main>
        <header>
            <div class="hero"></div>
            <div>
                <h1 class="headline">Nathalie Bibeau</h1>
            </div>
        </header>
  <section>
    <div class="grid" v-for="work in works" :key="work.id">
      <div>
        <h2>{{work.title.rendered}}</h2><br>
        <img src="https://source.unsplash.com/random">
        <p>{{work.meta_box['_works_description']}}</p>
        <p><a :href="work.meta_box['_works_link']">View</a></p>
      </div>
    </div>
  </section>

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
      image:require('~/static/hero.jpg') 
    }
  }
}
</script>

<style scoped>
header {
    display:grid;
    grid-template-columns: 1fr 1fr;
    height: 100vh;
    background-color: #FB9A52;
    color: white;
}
header div {
    display:grid; 
  align-items: center;
  justify-content: center;
}
.hero {
    background-image:url('~static/hero.jpg');
    background-position: center;
    background-size:cover;
}
.headline {
    border: 4px solid white;
    padding: 2rem;
}
section{
    display: grid;
    grid-template-columns: auto auto auto;
    grid-gap: 30px;
    max-width: 1366px;
    padding: 30px;
}
</style>
