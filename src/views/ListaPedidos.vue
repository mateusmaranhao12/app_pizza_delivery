<template>
    <Navbar />
    <div class="titulo-lista-pedidos">
        <h1>Lista de pedidos</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
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
            clientes: []
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
                });
        },
    }
}
</script>

<style lang="scss" scoped>
@import '../scss/lista_pedidos.scss';
</style>