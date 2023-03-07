<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 ml-auto mr-auto offset-md-4">
          <div class="card my-4">
            <div class="card-heading">
              <h4 class="h card-title bg-warning p-3 text-center text-white">
                Login de funcionario
              </h4>
            </div>
            <div class="card-body">

              <form action="" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-12 mx-2">
                    <label for="user">E-mail</label>
                    <input type="text" placeholder="e-mail" id="email" class="form-control mb-3" name="email"/>
                  </div>
                  <div class="form-group col-md-12 mx-2">
                    <label for="senha">Senha</label>
                    <input type="password" placeholder="Senha" id="senha" class="form-control" name="senha"/>
                  </div>
                </div>
                
                <div class="form-row mt-3 mb-3 text-center">
                  <small>Ainda não tem conta? <router-link class="cadastro" to="/cadastro">Cadastre-se</router-link> agora mesmo!</small>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <button class="btn btn-warning float-end mt-2" @click.prevent="fazerLogin()">Fazer login</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


export default {
  name: 'Index',

  methods: {

    fazerLogin() {
      this.$router.push('/home')
    }

  }
}
</script>

<style scoped lang="scss">
  @import '../scss/index.scss';
</style>