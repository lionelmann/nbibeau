<template>
  <div class="masonry bordered">
    <div class="brick" v-for="(film, index) in films" :key="index">
      <img :src="`/cover/${film.image}`" />
      <h2>{{ film.title }} / {{ film.year }}</h2>
      <br />
      <div class="meta">{{ film.category }}</div>
      <div class="meta">{{ film.roles }}</div>
      <div class="meta">{{ film.length }}</div>
      <div class="meta">{{ film.broadcaster }}</div>
      <br />
      <nuxt-content :document="film"></nuxt-content>
      <br />
      <a :href="film.website" target="_blank">View</a>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    films: [],
  }),
  async fetch() {
    this.films = await this.$content("films").sortBy("year", "desc").fetch();
  },
};
</script>

<style lang="css" scoped>
.meta {
  font-family: "Noto Sans", sans-serif;
  color: #735c4f;
  font-size: 0.9rem;
}

a {
  text-decoration: none;
  font-family: "Lato", sans-serif;
  color: #735c4f;
}

img {
  /*border: 3px solid #735c4f;*/
  filter: drop-shadow(10px 10px 0px rgba(115, 92, 79, 0.4));
}

a:hover {
  border-bottom: 2px solid #735c4f;
}

/* Masonry grid */
.masonry {
  transition: all 0.5s ease-in-out;
  column-gap: 30px;
  column-fill: initial;
  padding: 30px;
  background-color: #f2cf63;
}

/* Masonry item */
.masonry .brick {
  margin-bottom: 30px;
  display: inline-block; /* Fix the misalignment of items */
  vertical-align: top; /* Keep the item on the very top */
}

/* Masonry image effects */
.masonry .brick img {
  transition: all 0.5s ease-in-out;
  backface-visibility: hidden; /* Remove Image flickering on hover */
  margin-bottom: 20px;
}

.masonry .brick:hover img {
  /*opacity: 0.75;*/
}

/* Bordered masonry */
.masonry.bordered {
  column-rule: 0px solid rgba(115, 92, 79, 0.2);
  column-gap: 50px;
}

.masonry.bordered .brick {
  padding-bottom: 25px;
  margin-bottom: 25px;
  border-bottom: 1px solid rgba(115, 92, 79, 0.2);
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
    column-count: 3;
  }
}
</style>
