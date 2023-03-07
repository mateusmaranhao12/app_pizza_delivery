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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mateus</td>
                            <td>feradourada@gmail.com</td>
                            <td>+55 (79) 99176-2846</td>
                            <td>4 Queijos</td>
                            <td>Cheddar</td>
                            <td>6</td>
                            <td>105</td>
                            <td>Casa 09</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Nicolas</td>
                            <td>nicolas@gmail.com</td>
                            <td>+55 (79) 99176-2846</td>
                            <td>4 Queijos</td>
                            <td>Cheddar</td>
                            <td>6</td>
                            <td>105</td>
                            <td>Casa 09</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../components/Navbar.vue'
export default {
    name: 'ListaPedidos',

    components: {
        Navbar
    }
}
</script>

<style lang="scss" scoped>
@import '../scss/lista_pedidos.scss';
</style>