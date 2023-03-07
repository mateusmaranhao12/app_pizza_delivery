<template>
    <Navbar />
        <div class="home">
            <div class="bem-vindo">
                <h1>Bem vindo ao Pizza Delivery</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="secao1 mb-2 col-md-6 mt-5">
                        <img src="../assets/pizza1.jpg" class="img-fluid" />
                    </div>
                    <div class="secao1 mb-2 col-md-6 mt-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin sem in nisi consectetur rhoncus. Duis dignissim sem orci, at maximus nisi maximus et. Praesent nec commodo magna. Etiam condimentum, est in egestas lacinia, nulla lorem gravida felis, quis iaculis lorem ipsum sit amet mi. Suspendisse egestas auctor odio in interdum. Vestibulum faucibus viverra lobortis. Donec sit amet sagittis turpis. Praesent iaculis consectetur massa, varius facilisis ipsum lobortis a. Sed venenatis nibh enim, sed consectetur mi vulputate id.</p>
                    </div>
                    <div class="secao2 mb-2 col-md-6 mt-5">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin sem in nisi consectetur rhoncus. Duis dignissim sem orci, at maximus nisi maximus et. Praesent nec commodo magna. Etiam condimentum, est in egestas lacinia, nulla lorem gravida felis, quis iaculis lorem ipsum sit amet mi. Suspendisse egestas auctor odio in interdum. Vestibulum faucibus viverra lobortis. Donec sit amet sagittis turpis. Praesent iaculis consectetur massa, varius facilisis ipsum lobortis a. Sed venenatis nibh enim, sed consectetur mi vulputate id.</p>
                    </div>
                    <div class="secao2 mb-2 col-md-6 mt-5">
                        <img src="../assets/pizza2.jpg" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import Navbar from '../components/Navbar.vue'
    export default {
        name: 'Home',

        components: {
            Navbar
        }
    }
</script>

<style scoped lang="scss">
    @import '../scss/home.scss';
</style>