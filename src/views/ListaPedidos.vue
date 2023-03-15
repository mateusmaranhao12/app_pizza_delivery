<template>
    <Navbar />
    <div class="titulo-lista-pedidos">
        <h1>Lista de pedidos</h1>
    </div>
    <div class="container">
        <div class="row">
            <h2 class="mt-3 col-md-6">Filtrar pedidos</h2>
            <div class="col-md-6 mt-3">
                <select class="form-select" aria-label="Filtrar" v-model="ordenacao">
                    <option value="">Selecione uma opção</option>
                    <option value="1">Ordem alfabética</option>
                    <option value="2">Ordem alfabética inversa</option>
                    <option value="3">Ordem por ID inversa</option>
                    <option value="4">Ordenar por ID (Padrão)</option>
                </select>
            </div>
            <div class="col table-responsive">
                <table class="table table-striped table-hover mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Sabor de Pizza</th>
                            <th scope="col">Borda</th>
                            <th scope="col">Rua</th>
                            <th scope="col">Número</th>
                            <th scope="col">Complemento</th>
                            <th scope="col">Bairro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cliente in clientes" :key="cliente.ID">
                            <th scope="row">{{ cliente.ID }}</th>
                            <td>{{ cliente.nome }}</td>
                            <td>{{ cliente.email }}</td>
                            <td>{{ cliente.telefone }}</td>
                            <td>{{ cliente.sabor_pizza }}</td>
                            <td>{{ cliente.borda_pizza }}</td>
                            <td>{{ cliente.rua }}</td>
                            <td>{{ cliente.numero }}</td>
                            <td>{{ cliente.complemento }}</td>
                            <td>{{ cliente.bairro }}</td>
                            <td>
                                <button class="btn btn-danger" @click="removerPedido(cliente.ID)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Navbar from '../components/Navbar.vue'
export default {
    name: 'ListaPedidos',

    components: {
        Navbar
    },

    data() {
        return {
            clientes: [],
            ordenacao: '',
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

    watch: {

        ordenacao(valorNovo) {

            if (valorNovo == 1) { //ordenação por ordem alfabética

                this.clientes.sort((proximo, atual) => {
                    //1 caso a ordem esteja correta
                    if (atual.nome < proximo.nome) {
                        return 1
                    }
                    //-1 caso a ordem esteja incorreta (precisa inverter as posições)
                    if (atual.nome > proximo.nome) {
                        return -1
                    }
                    //0 caso nenhuma acao seja necessaria
                    return 0

                })

            } else if (valorNovo == 2) { //inverter ordem alfabética
                this.clientes.sort((proximo, atual) => {
                    //1 caso a ordem esteja correta
                    if (atual.nome > proximo.nome) {
                        return 1
                    }
                    //-1 caso a ordem esteja incorreta (precisa inverter as posições)
                    if (atual.nome < proximo.nome) {
                        return -1
                    }
                    //0 caso nenhuma acao seja necessaria
                    return 0

                })
            } else if (valorNovo == 3) { //ordenar ID inverso
                this.clientes.sort((proximo, atual) => {
                    //1 caso a ordem esteja correta
                    if (atual.ID > proximo.ID) {
                        return 1
                    }
                    //-1 caso a ordem esteja incorreta (precisa inverter as posições)
                    if (atual.ID < proximo.ID) {
                        return -1
                    }
                    //0 caso nenhuma acao seja necessaria
                    return 0

                })
            } else {
                this.clientes.sort((proximo, atual) => {
                    //1 caso a ordem esteja correta
                    if (atual.ID < proximo.ID) {
                        return 1
                    }
                    //-1 caso a ordem esteja incorreta (precisa inverter as posições)
                    if (atual.ID > proximo.ID) {
                        return -1
                    }
                    //0 caso nenhuma acao seja necessaria
                    return 0

                })
            }

        }

    },

    mounted() {
        this.getClientes()
    },

    methods: {
        getClientes() {
            axios.get('http://localhost/Projetos/app_pizza_delivery/src/backend/clientes.php')
                .then((res) => {
                    if (res.data.error) {
                        this.mensagem_erro = res.data.mensagem
                    }
                    else {
                        this.clientes = res.data.clientes
                    }
                })
        },

        removerPedido(ID) {

            axios.delete('http://localhost/Projetos/app_pizza_delivery/src/backend/clientes.php?acao=remover_pedido', {
                params: {
                    ID: ID
                }
            }) .then((res) => {
                console.log(res.data);
            })
            .catch((error) => {
                console.log(error);
            })

            location.reload()
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../scss/lista_pedidos.scss';
</style>