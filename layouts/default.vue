<template>
  <div>
    <TheHeader />
    <nuxt />
    <TheFooter />
  </div>
</template>

<style>
html {
  font-family: "Scope One", serif;
  font-size: 16px;
  /*word-spacing: 1px;*/ /*We love you always!*/
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
  height: 100%;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Bebas Neue", cursive;
  color: #735c4f;
}

h1 {
  font-size: 6rem;
}

*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}

img {
  width: 100%;
  /*filter: grayscale(100%);*/
}
</style>
