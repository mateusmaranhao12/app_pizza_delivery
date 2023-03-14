<template>
  <div id="login">
    <div v-if="erro_login" class="alert alert-danger alert-dismissible fade show" role="alert">
      <h5>{{ erro_login }}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
        @click="fecharMensagem()"></button>
    </div>
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
                    <input type="text" ref="email" placeholder="e-mail" id="email" class="form-control mb-3" name="email"
                      v-model="funcionarios_registrados.email" />
                  </div>

                  <div class="form-group col-md-12 mx-2">
                    <label for="senha">Senha</label>
                    <div class="input-group mb-3">
                      <input v-if="mostrar_senha" type="text" 
                        class="form-control" 
                        placeholder="Senha" 
                        v-model="funcionarios_registrados.senha" 
                        name="senha"
                        aria-label="Senha" 
                        aria-describedby="button-addon2"
                      >
                      <input v-else type="password" 
                        class="form-control" 
                        placeholder="Senha" 
                        v-model="funcionarios_registrados.senha" 
                        name="senha"
                        aria-label="Senha" 
                        aria-describedby="button-addon2"
                      >
                      <button @click="alternarExibicaoSenha()" class="btn btn-outline-dark" type="button" id="senha">
                        <i class="fa-solid" :class="{ 'fa-eye-slash' : mostrar_senha, 'fa-eye': !mostrar_senha }"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="form-row mt-3 mb-3 text-center">
                  <small>Ainda não tem conta? <router-link class="cadastro" to="/cadastro">Cadastre-se</router-link> agora
                    mesmo!</small>
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

import axios from 'axios'

export default {
  name: 'Index',

  el: '#login',

  data() {
    return {
      mensagem_sucesso: '',
      mensagem_erro: '',
      erro_login: '',
      funcionarios: [],
      funcionarios_registrados: { email: '', senha: '' },
      mostrar_senha: false,
      senha: null
    }
  },

  methods: {

    fazerLogin() {

      var data = this.toFormData(this.funcionarios_registrados)
      data.append('email', this.funcionarios_registrados.email)
      data.append('senha', this.funcionarios_registrados.senha)

      axios
        .post(
          'http://localhost/Projetos/app_pizza_delivery/src/backend/funcionarios.php?acao=login',
          data
        )

        .then((res) => {


          if (res.data.error) {
            this.erro_login = res.data.mensagem
          } else {
            this.$router.push('/home')
          }

        }).catch((err) => {

          console.log('erro', err)

        })
    },

    toFormData(obj) {
      var liveFormData = new FormData();
      for (var key in obj) {
        liveFormData.append(key, obj[key])
      }
      return liveFormData
    },

    fecharMensagem() {
      this.sucesso_login = '',
        this.erro_login = ''
    },

    alternarExibicaoSenha() {
      this.mostrar_senha = !this.mostrar_senha
    }

  }
}
</script>

<style scoped lang="scss">@import '../scss/index.scss';</style>