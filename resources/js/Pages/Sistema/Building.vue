<template>
<app-layout>
    <div>

      <div class="error-page">
        <h2 class="headline text-warning"> Construyendo</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Pagina en construccion.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
      </div>
        
    </div>
</app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 

    export default {
        props: ['sessions'],

        components: {
            AppLayout, 
        },
    }
</script>
