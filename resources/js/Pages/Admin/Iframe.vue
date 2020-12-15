<template>
  <app-layout>
    <div class="col-md-12" style="margin-top: -20px">
      <iframe src="/ventana" width="100%" height="500px">
      </iframe>
    
    </div>
  </app-layout>
</template>

<script> 
  import AppLayout from '@/Layouts/AppLayout'  
  export default { 

    data(){
      return{
        datos: this.roles, 
      }
    },

    components: {
        AppLayout,  
    },
    methods:{
      
    }
  }
</script>
