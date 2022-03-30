export default {
  target: "static",
  components: true,
  /*
   ** Headers of the page
   */
  head: {
    title: "Nathalie Bibeau",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      {
        hid: "description",
        name: "description",
        content:
          "Nathalie Bibeau is an award-winning filmmaker known for her artistic approach to controversial stories. ",
      },
    ],
    link: [
      { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
      {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato&family=Scope+One&display=swap",
      },
    ],
  },

  /*
   ** Customize the progress-bar color
   */
  loading: { color: "#fff" },

  /*
   ** Global CSS
   */
  css: [],

  /*
   ** Plugins to load before mounting the App  //we love you very much//
   */
  plugins: [],

  /*
   ** Nuxt.js modules
   */
  modules: ["@nuxtjs/axios", "@nuxt/content"],

  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {},
  },
  /*
   ** Router configuration
   */
  router: process.env.BASE ? { base: process.env.BASE } : {},
  /*
   ** Server configuration
   */
  server: {
    port: process.env.NUXT_PORT, // default: 3000
  },
};
