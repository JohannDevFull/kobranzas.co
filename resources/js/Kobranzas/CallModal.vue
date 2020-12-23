<template>
  <div class="md:grid md:grid-cols-3 md:gap-6" >
    

      <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">.col-md-4</div>
      <div class="col-md-4 ml-auto">.col-md-4 .ml-auto</div>
    </div>
    <div class="row">
      <div class="col-md-3 ml-auto">.col-md-3 .ml-auto</div>
      <div class="col-md-2 ml-auto">.col-md-2 .ml-auto</div>
    </div>
    <div class="row">
      <div class="col-md-6 ml-auto">.col-md-6 .ml-auto</div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        Level 1: .col-sm-9
        <div class="row">
          <div class="col-8 col-sm-6">
            Level 2: .col-8 .col-sm-6
          </div>
          <div class="col-4 col-sm-6">
            Level 2: .col-4 .col-sm-6
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>

    
    
  </div>
</template>

<script>  
  
    export default { 
        props: ['select'],
        components: {

        },
        
        data() {
            return {
              form: { 
                name: null, 
                rol: "Escoger Rol", 
                selected: "",
              },
            }
        },

        methods: {
            submit(form){

              this.$inertia.post('asignar',this.form,{
                onSuccess:()=>{
                  alert("Exíto al asignar rol");
                },
              })
              
            }
        },
    }
</script>
