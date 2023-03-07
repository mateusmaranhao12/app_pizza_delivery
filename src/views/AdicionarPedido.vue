<template>
    <Navbar />
    <div class="titulo-adicionar-pedido">
        <h1>Adicionar pedidos</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <Formulario />
            </div>
        </div>
    </div>
</template>

<script>
import Formulario from '../components/Formulario.vue'
import Navbar from '../components/Navbar.vue'
export default {
    name: 'AdicionarPedido',

    components: {
        Navbar, Formulario
    }
}
</script>

<style lang="scss" scoped>
    @import '../scss/adicionar_pedido.scss';
</style>