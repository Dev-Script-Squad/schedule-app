<template>
  <div class="container">
    <div class="form-login">
      <form :action="loginUrl" method="post">
        <input type="hidden" name="_token" :value="csrfToken">
        <input type="email" name="email" class="text" placeholder="Email" v-model="email">
        <input type="password" name="password" class="text" placeholder="Senha" v-model="password">
        <button class="submit">Entrar</button>
      </form>
      <a href="esqueciasenha.com">Esqueci a senha</a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    loginUrl: {
      type: String,
      required: true
    },
    csrfToken: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      email: '',
      password: ''
    };
  }
};
</script>

<style scoped>
.container {
  display: flex;
  padding: 0.5rem;
}

.form-login {
  flex-direction: column;
}

.text {
  margin-bottom: 0.5rem;
  padding: 0.5rem;
  width: 100%;
  max-width: 400px;
  box-sizing: border-box;
}

.submit {
  padding: 0.5rem;
  width: 100%;
  max-width: 400px;
}

a {
  margin-top: 1rem;
  color: blue;
  text-decoration: underline;
}
</style>
