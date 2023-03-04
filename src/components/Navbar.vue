<template>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <router-link to="/home" class="navbar-brand" href="#"><i class="fa-solid fa-pizza-slice"></i> Pizza Delivery</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link to="/home" class="nav-link" aria-current="page"><i class="fa-solid fa-house"></i> Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/adicionar-pedido" class="nav-link" aria-current="page"><i class="fa-solid fa-plus"></i> Adicionar pedido</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/lista-pedidos" class="nav-link" aria-current="page"><i class="fa-solid fa-list"></i> Lista de pedidos</router-link>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link" aria-current="page"><i class="fa-solid fa-right-from-bracket"></i> Log-out</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<style scoped lang="scss">
  @import '../scss/navbar.scss';
</style>