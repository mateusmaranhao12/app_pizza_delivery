<template>
    <div v-if="pedido_sucesso" class="mt-5 alert alert-success alert-dismissible fade show" role="alert">
        <h5>{{ pedido_sucesso }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
            @click="fecharMensagem()"></button>
    </div>
    <div v-if="pedido_erro" class="mt-5 alert alert-danger alert-dismissible fade show" role="alert">
        <h5>{{ pedido_erro }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
            @click="fecharMensagem()"></button>
    </div>
    <!--Etapa 1-->
    <div v-if="etapa == 1" class="mt-5">
        <h2 class="mt-5 mb-5">Etapa 1: Informações do cliente</h2>
        <div class="form-group mx-2 mb-3">
            <label for="nome">Nome</label>
            <input type="text" v-model="lista_clientes.nome" placeholder="Nome do cliente" ref="nome" class="form-control"
                name="nome" />
            <small class="text-danger">{{ erro_nome }}</small>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="email">E-mail</label>
            <input type="text" v-model="lista_clientes.email" placeholder="E-mail do cliente" ref="email"
                class="form-control" name="email" />
            <small class="text-danger">{{ erro_email }}</small>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="telefone">Telefone</label>
            <input type="tel" v-model="lista_clientes.telefone" placeholder="Telefone do cliente" ref="telefone"
                v-maska="'(##) #####-####'" class="form-control" name="telefone" />
            <small class="text-danger">{{ erro_telefone }}</small>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="sabor_pizza">Sabor de pizza: </label>
            <select class="form-select" v-model="lista_clientes.sabor_pizza" name="sabor_pizza" id="sabor_pizza">
                <option value="">Escolha um sabor</option>
                <option v-for="p in sabor_pizza" :key="p" :value="p">
                    {{ p }}
                </option>
            </select>
            <small class="text-danger">{{ erro_sabor_pizza }}</small>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="borda_pizza">Borda da pizza: </label>
            <select class="form-select" v-model="lista_clientes.borda_pizza" name="borda_pizza" id="borda_pizza">
                <option value="">Escolha um tipo de borda</option>
                <option v-for="b in borda_pizza" :key="b" :value="b">
                    {{ b }}
                </option>
            </select>
            <small class="text-danger">{{ erro_borda_pizza }}</small>
        </div>
        <button class="btn btn-warning float-end mt-5 mb-5" @click="proximaEtapa()">
            Próxima etapa <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

    <!--Etapa 2-->
    <div v-if="etapa == 2" class="mt-5">
        <h2 class="mt-5 mb-5">Etapa 2: Endereço do cliente</h2>
        <div class="form-group col-md-12 mx-2 mb-3">
            <label for="rua">Rua</label>
            <input type="text" v-model="lista_clientes.rua" placeholder="Rua" ref="rua" class="form-control" name="rua" />
            <small class="text-danger">{{ erro_rua }}</small>
        </div>
        <div class="form-group col-md-12 mx-2 mb-3">
            <label for="numero">Número</label>
            <input type="text" v-model="lista_clientes.numero" placeholder="Número" ref="numero" class="form-control"
                name="numero" />
            <small class="text-danger">{{ erro_numero }}</small>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="complemento">Complemento</label>
            <input type="text" v-model="lista_clientes.complemento" placeholder="Complemento" ref="complemento"
                class="form-control" name="complemento" />
            <small class="text-danger">{{ erro_complemento }}</small>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="complemento">Bairro</label>
            <input type="text" v-model="lista_clientes.bairro" placeholder="Bairro" ref="bairro" class="form-control"
                name="bairro" />
            <small class="text-danger">{{ erro_bairro }}</small>
        </div>

        <button class="btn btn-warning float-end mt-5 mb-5" @click="finalizarPedido()">Finalizar Pedido
            <i class="fa-solid fa-check"></i>
        </button>
        <button class="btn btn-warning float-start mt-5 mb-5" @click="etapaAnterior()">
            <i class="fa-solid fa-arrow-left"></i> Etapa anterior
        </button>
    </div>
</template>

<script>

import axios from 'axios'
export default {
    name: 'Formulario',

    data() {
        return {
            pedido_sucesso: '',
            pedido_erro: '',
            erro_nome: '',
            erro_email: '',
            erro_telefone: '',
            erro_sabor_pizza: '',
            erro_borda_pizza: '',
            erro_rua: '',
            erro_numero: '',
            erro_complemento: '',
            erro_bairro: '',
            etapa: 1,
            sabor_pizza: ['4 Queijos', 'Frango com Catupiry', 'Margherita'],
            borda_pizza: ['Cheddar', 'Catupiry', 'Normal'],
            clientes: [],
            lista_clientes: {
                nome: '',
                email: '',
                telefone: '',
                sabor_pizza: '',
                borda_pizza: '',
                rua: '',
                numero: '',
                complemento: '',
                bairro: ''

            }
        }
    },

    methods: {

        proximaEtapa() {
            if (this.lista_clientes.nome == '' ||
                this.lista_clientes.email == '' ||
                this.lista_clientes.telefone == '' ||
                this.lista_clientes.sabor_pizza == '' ||
                this.lista_clientes.borda_pizza == '') {
                this.pedido_erro = 'Preencha todos os campos para passar para a próxima etapa!'
            } else {
                this.etapa = 2
            }
        },

        etapaAnterior() {
            this.etapa = 1
        },

        finalizarPedido() {

            var finalizar_pedido = this.toFormData(this.lista_clientes)
            axios.post(
                'http://localhost/Projetos/app_pizza_delivery/src/backend/clientes.php?acao=finalizar_pedido', finalizar_pedido
            ).then((res) => {
                if (res.data.nome) {

                    this.erro_nome = res.data.mensagem
                    this.nomeFocus()

                } else if (res.data.email) {

                    this.erro_email = res.data.mensagem
                    this.emailFocus()

                } else if (res.data.telefone) {

                    this.erro_telefone = res.data.mensagem
                    this.telefoneFocus()

                } else if (res.data.sabor_pizza) {

                    this.erro_sabor_pizza = res.data.mensagem
                    this.saborPizzaFocus()

                } else if (res.data.borda_pizza) {

                    this.erro_borda_pizza = res.data.mensagem
                    this.bordaPizzaFocus()

                } else if (res.data.rua) {

                    this.erro_rua = res.data.mensagem
                    this.ruaFocus()

                } else if (res.data.numero) {

                    this.erro_numero = res.data.mensagem
                    this.numeroFocus()

                } else if (res.data.complemento) {

                    this.erro_complemento = res.data.mensagem
                    this.complementoFocus()

                } else if (res.data.bairro) {

                    this.erro_bairro = res.data.mensagem
                    this.bairroFocus()

                } else {

                    this.pedido_sucesso = res.data.mensagem
                    this.erro_nome = ''
                    this.erro_email = ''
                    this.erro_telefone = ''
                    this.erro_sabor_pizza = ''
                    this.erro_borda_pizza = ''
                    this.erro_rua = ''
                    this.erro_numero = ''
                    this.erro_complemento = ''
                    this.erro_bairro = ''
                    this.limparFormulario()
                    this.etapa = 1

                }

            })
        },

        limparFormulario() {
            this.lista_clientes.nome = '',
                this.lista_clientes.email = '',
                this.lista_clientes.telefone = '',
                this.lista_clientes.sabor_pizza = '',
                this.lista_clientes.borda_pizza = '',
                this.lista_clientes.rua = '',
                this.lista_clientes.numero = '',
                this.lista_clientes.complemento = '',
                this.lista_clientes.bairro = ''
        },

        fecharMensagem() {
            this.pedido_erro = '',
                this.pedido_sucesso = ''
        },

        toFormData(obj) {
            var liveFormData = new FormData();
            for (var key in obj) {
                liveFormData.append(key, obj[key])
            }
            return liveFormData
        },

        nomeFocus() {
            this.$refs.nome.focus()
        },

        emailFocus() {
            this.$refs.email.focus()
        },

        telefoneFocus() {
            this.$refs.telefone.focus()
        },

        saborPizzaFocus() {
            this.$refs.sabor_pizza.focus()
        },

        bordaPizzaFocus() {
            this.$refs.borda_pizza.focus()
        },

        ruaFocus() {
            this.$refs.rua.focus()
        },

        numeroFocus() {
            this.$refs.numero.focus()
        },

        bairroFocus() {
            this.$refs.bairro.focus()
        },

        complementoFocus() {
            this.$refs.complemento.focus()
        },

    }
}
</script>

<style lang="scss" scoped>
@import '../scss/adicionar_pedido.scss';
</style>