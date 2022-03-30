<template>
  <footer>
    <div><a class="button" href="mailto:nat.bibeau@gmail.com">Contact</a></div>
  </footer>
</template>

<script>
export default {};
</script>

<style lang="css" scoped>
footer {
  background-color: #f2cf63;
  height: 200px;
  width: 100%;
}

footer div {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  height: 200px;
}

.button {
  text-decoration: none;
  border: 3px solid #735c4f;
  color: #735c4f;
  font-family: "Lato";
  font-weight: bold;
  text-transform: uppercase;
  padding: 8px;
}

.button:hover {
  border: 3px solid #735c4f;
  color: #f2cf63;
  background-color: #735c4f;
}
</style>
