<template>
    <!--Etapa 1-->
    <div v-if="etapa == 1" class="mt-5">
        <h2 class="mt-5 mb-5">Etapa 1: Informações do cliente</h2>
        <div class="form-group mx-2 mb-3">
            <label for="nome">Nome</label>
            <input type="text" v-model="lista_clientes.nome" placeholder="Nome do cliente" ref="nome" class="form-control" name="nome" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="email">E-mail</label>
            <input type="text" v-model="lista_clientes.email" placeholder="E-mail do cliente" ref="email" class="form-control" name="email" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="telefone">Telefone</label>
            <input type="tel" v-model="lista_clientes.telefone" placeholder="Telefone do cliente" ref="telefone" v-maska="'(##) #####-####'"
                class="form-control" name="telefone" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="sabor_pizza">Sabor de pizza: </label>
            <select class="form-select" v-model="lista_clientes.sabor_pizza" name="sabor_pizza" id="sabor_pizza">
                <option value="">Escolha um sabor</option>
                <option v-for="p in sabor_pizza" :key="p" :value="p">
                    {{ p }}
                </option>
            </select>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="borda_pizza">Borda da pizza: </label>
            <select class="form-select" v-model="lista_clientes.borda_pizza" name="borda_pizza" id="borda_pizza">
                <option value="">Escolha um tipo de borda</option>
                <option v-for="b in borda_pizza" :key="b" :value="b">
                    {{ b }}
                </option>
            </select>
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
        </div>
        <div class="form-group col-md-12 mx-2 mb-3">
            <label for="numero">Número</label>
            <input type="text" v-model="lista_clientes.numero" placeholder="Número" ref="numero" class="form-control" name="numero" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="complemento">Complemento</label>
            <input type="text" v-model="lista_clientes.complemento" placeholder="Complemento" ref="complemento" class="form-control" name="complemento" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="complemento">Bairro</label>
            <input type="text" v-model="lista_clientes.bairro" placeholder="Bairro" ref="bairro" class="form-control" name="bairro" />
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
export default {
    name: 'Formulario',

    data() {
        return {
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
            this.etapa = 2
        },

        etapaAnterior() {
            this.etapa = 1
        },

        finalizarPedido() {
            this.etapa = 1
        }

    }
}
</script>

<style lang="scss" scoped>
@import '../scss/adicionar_pedido.scss';
</style>