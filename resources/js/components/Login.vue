<script>
  export default {
    
  }
</script>
<template>
  <div class="container">
    <div class="left-image">
      <img src="../../../public/leftImage.svg"
        alt="Aluna na sala de aula levantando a mão para tirar uma dúvida com seu professor">
    </div>
    <div class="login">
      <div class="header-login">
        <img src="../../../public/smile.svg" alt="Emoji Sorridente azul">
        <h2>Bem vindo</h2>
      </div>
      <div class="form-login">
        <div class="inputs-login">
          <input type="text" class="text" placeholder="Email">
          <input type="password" class="text" placeholder="Senha">
        </div>
        <div class="buttons-login">
          <a href="esqueciasenha.com"></a>
          <button class="submit">Entrar</button>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
.container {
  display: flex;
  padding: .5rem;
  /* justify-content: space-between; */
}

.leftImage {
  width: 100%;
  height: auto;
}

.login {

}
</style>