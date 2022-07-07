<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <Link class="navbar-brand" href="/">LARAVEL + INERTIA.JS</Link>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <Link class="nav-link" href="/">User</Link>
            </li>
            <li class="nav-item">
              <Link class="nav-link" href="/post">Post</Link>
            </li>
            <li class="nav-item">
              <Link class="nav-link" href="/comment">Coment</Link>
            </li>
          </ul>
          <form class="d-flex">

          </form>
        </div>
      </div>
    </nav>

    <main class="container mt-5">
      <slot />
    </main>
  </div>
</template>

<script>



  //import Link dari inertia
  import { Link } from '@inertiajs/inertia-vue3';

  export default {


    //register Link di component
    components: {
      Link
    },
  }
</script>

<style scoped>
    .mt-5 {
      margin-top: 100px!important;
    }
</style>
