<template>
<app-layout>
    <div>

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">LLamadas (Dos)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Default form register -->
            
 
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a>
          </div>
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
