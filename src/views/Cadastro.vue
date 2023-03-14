<template>
    <div id="cadastro">
        <div v-if="mensagem_sucesso" class="alert alert-success alert-dismissible fade show" role="alert">
            <h5>{{ mensagem_sucesso }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                @click="fecharMensagem()"></button>
        </div>
        <div v-if="mensagem_erro" class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5>{{ mensagem_erro }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                @click="fecharMensagem()"></button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 ml-auto mr-auto offset-md-4">
                    <div class="card my-4">
                        <div class="card-heading">
                            <h4 class="h card-title bg-warning p-3 text-center text-white">
                                Cadastro de funcionário
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-12 mx-2">
                                    <label for="nome">Nome</label>
                                    <input type="text" placeholder="Nome" ref="nome" id="nome"
                                        v-model="funcionarios_registrados.nome" class="form-control mb-2" name="nome" />
                                    <small class="text-danger">{{ erro_nome }}</small>
                                </div>

                                <div class="form-group col-md-12 mx-2">
                                    <label for="email">E-mail</label>
                                    <input type="text" placeholder="e-mail" ref="email" id="email"
                                        v-model="funcionarios_registrados.email" class="form-control mb-2" name="email" />
                                    <small class="text-danger">{{ erro_email }}</small>
                                </div>
                                <div class="form-group col-md-12 mx-2">
                                    <label for="cpf">CPF</label>
                                    <input type="cpf" placeholder="CPF" ref="cpf" id="cpf"
                                        v-model="funcionarios_registrados.cpf" class="form-control mb-2" name="cpf"
                                        v-maska="'###.###.###-##'" />
                                    <small class="text-danger">{{ erro_cpf }}</small>
                                </div>
                                <div class="form-group col-md-12 mx-2">
                                    <label for="senha">Senha</label>
                                    <div class="input-group mb-3">
                                        <input v-if="mostrar_senha" type="text" class="form-control" placeholder="Senha"
                                            v-model="funcionarios_registrados.senha" name="senha" aria-label="Senha"
                                            aria-describedby="button-addon2">
                                        <input v-else type="password" class="form-control" placeholder="Senha"
                                            v-model="funcionarios_registrados.senha" name="senha" aria-label="Senha"
                                            aria-describedby="button-addon2">
                                        <button @click="alternarExibicaoSenha()" class="btn btn-outline-dark" type="button"
                                            id="senha">
                                            <i class="fa-solid"
                                                :class="{ 'fa-eye-slash': mostrar_senha, 'fa-eye': !mostrar_senha }"></i>
                                        </button>
                                    </div>
                                    <small class="text-danger">{{ erro_senha }}</small>
                                </div>
                            </div>

                            <div class="form-row mt-3 mb-3 text-center">
                                <small>
                                    Já tem uma conta? <router-link class="cadastro" to="/">Faça login</router-link> agora
                                    mesmo!
                                </small>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button class="btn btn-warning float-end mt-2"
                                        @click="cadastrarFuncionario()">Cadastrar</button>
                                </div>
                            </div>

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
    name: 'Cadastro',

    el: '#cadastro',

    data() {
        return {
            mensagem_sucesso: '',
            mensagem_erro: '',
            erro_nome: '',
            erro_email: '',
            erro_cpf: '',
            erro_senha: '',
            funcionarios: [],
            funcionarios_registrados: { nome: '', email: '', cpf: '', senha: '' },
            mostrar_senha: false,
            senha: null
        }
    },

    methods: {

        cadastrarFuncionario() {
            var cadastrar_funcionario = this.toFormData(this.funcionarios_registrados)
            axios.post(
                'http://localhost/Projetos/app_pizza_delivery/src/backend/funcionarios.php?acao=cadastrar', cadastrar_funcionario
            ).then((res) => {
                if (res.data.nome) {

                    this.erro_nome = res.data.mensagem
                    this.nomeFocus()

                } else if (res.data.email) {

                    this.erro_email = res.data.mensagem
                    this.emailFocus()

                } else if (res.data.cpf) {

                    this.erro_cpf = res.data.mensagem
                    this.cpfFocus()

                } else if (res.data.senha) {

                    this.erro_senha = res.data.mensagem
                    this.senhaFocus()

                } else {

                    this.mensagem_sucesso = res.data.mensagem
                    this.erro_nome = ''
                    this.erro_email = ''
                    this.erro_cpf = ''
                    this.erro_senha = ''
                    this.limparFormulario()

                }

            })
        },

        limparFormulario() {
            this.funcionarios_registrados.nome = '',
                this.funcionarios_registrados.email = '',
                this.funcionarios_registrados.cpf = '',
                this.funcionarios_registrados.senha = ''
        },

        nomeFocus() {
            this.$refs.nome.focus()
        },

        emailFocus() {
            this.$refs.email.focus()
        },

        cpfFocus() {
            this.$refs.cpf.focus()
        },

        senhaFocus() {
            this.$refs.senha.focus()
        },

        fecharMensagem() {
            this.mensagem_erro = '',
                this.mensagem_sucesso = ''
        },

        toFormData(obj) {
            var liveFormData = new FormData();
            for (var key in obj) {
                liveFormData.append(key, obj[key])
            }
            return liveFormData
        },

        alternarExibicaoSenha() {
            this.mostrar_senha = !this.mostrar_senha
        }
    }
}

</script>

<style scoped lang="scss">
@import '../scss/index.scss';
</style>