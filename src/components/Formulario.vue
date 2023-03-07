<template>
    <!--Etapa 1-->
    <div v-if="etapa == 1" class="mt-5">
        <h2 class="mt-5 mb-5">Etapa 1: Informações do cliente</h2>
        <div class="form-group mx-2 mb-3">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome do cliente" ref="nome" class="form-control" name="nome" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="email">E-mail</label>
            <input type="text" placeholder="E-mail do cliente" ref="email" class="form-control" name="email" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="telefone">Telefone</label>
            <input type="tel" placeholder="Telefone do cliente" ref="telefone" v-maska="'(##) #####-####'" class="form-control" name="telefone" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="sabor_pizza">Sabor de pizza: </label>
            <select class="form-select" name="sabor_pizza" id="sabor_pizza">
                <option value="">Escolha um sabor</option>
                <option value="margherita">
                    Margherita
                </option>
                <option value="frango_catupiry">
                    Frango c/ Catupiry
                </option>
                <option value="quatro_queijos">
                    4 queijos
                </option>
            </select>
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="borda_pizza">Borda da pizza: </label>
            <select class="form-select" name="borda_pizza" id="borda_pizza">
                <option value="">Escolha um tipo de borda</option>
                <option value="normal">
                    Normal
                </option>
                <option value="catupiry">
                    Catupiry
                </option>
                <option value="cheddar">
                    Cheddar
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
            <input type="text" placeholder="Rua" ref="rua" class="form-control" name="rua" />
        </div>
        <div class="form-group col-md-12 mx-2 mb-3">
            <label for="numero">Número</label>
            <input type="text" placeholder="Número" ref="numero" class="form-control" name="numero" />
        </div>
        <div class="form-group mx-2 mb-3">
            <label for="complemento">Complemento</label>
            <input type="text" placeholder="Complemento" ref="complemento" class="form-control" name="complemento" />
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
            etapa: 1
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