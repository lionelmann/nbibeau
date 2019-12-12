<template>
    <main>
        <header>
            <div class="hero"></div>
            <div>
                <h1 class="headline">Nathalie Bibeau</h1>
            </div>
        </header>
  <div class="masonry bordered">
    <div class="brick" v-for="work in works" :key="work.id">
        <img 
            v-if="work._embedded.hasOwnProperty('wp:featuredmedia')"
            :src="work._embedded['wp:featuredmedia'][0].media_details.sizes.medium['source_url']"
        >
        <h2>{{work.title.rendered}}</h2><br>
        <p>{{work.meta_box['_works_description']}}</p>
        <p><a :href="work.meta_box['_works_link']">View</a></p>
    </div>
  </div>

</main>
</template>

<script>
export default {
  async asyncData({ $axios }) {
      let works = await $axios.$get(`${process.env.BASE_API}/wp-json/wp/v2/work/?_embed`)
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
main {
    padding: 0px;
}
header {
    display:grid;
    grid-template-columns: 1fr 1fr;
    height: 100vh;
    background-color: #37474f;
  background-color: #735C4F;
    color: #F2CF63;
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
    border: 4px solid #F2CF63;
    padding: 2rem;
    color: #F2CF63;
}
section{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 30px;
    max-width: 1366px;
    padding: 30px;
}
/* Masonry grid */
.masonry {
  transition: all .5s ease-in-out;
  column-gap: 30px;
  column-fill: initial;
  padding: 30px;
}

/* Masonry item */
.masonry .brick {
  margin-bottom: 30px;
  display: inline-block; /* Fix the misalignment of items */
  vertical-align: top; /* Keep the item on the very top */
}

/* Masonry image effects */
.masonry .brick img {
  transition: all .5s ease-in-out;
  backface-visibility: hidden; /* Remove Image flickering on hover */
  margin-bottom: 10px;
}

.masonry .brick:hover img {
  opacity: .75;
}

/* Bordered masonry */
.masonry.bordered {
  column-rule: 1px solid #eee;
  column-gap: 50px;
}

.masonry.bordered .brick {
  padding-bottom: 25px;
  margin-bottom: 25px;
  border-bottom: 1px solid #eee;
}

/* Gutterless masonry */
.masonry.gutterless {
  column-gap: 0;
}

.masonry.gutterless .brick {
  margin-bottom: 0;
}

/* Masonry on tablets */
@media only screen and (min-width: 768px) and (max-width: 1023px) {
  .masonry {
    column-count: 2;
  }
}

/* Masonry on big screens */
@media only screen and (min-width: 1024px) {
  .desc {
    font-size: 1.25em;
  }

  .intro {
    letter-spacing: 1px;
  }

  .masonry {
    column-count: 4;
  }
}
</style>
