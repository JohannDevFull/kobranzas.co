<template>
  <div class="md:grid md:grid-cols-3 md:gap-6" >
    <form @submit.prevent="submit">
      <div class="modal fade" id="modalAsignarRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Asignar rol ausuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mx-3">
              <div class="form-group row mb-5">


                <i class="fas fa-user-shield prefix grey-text"></i>
                <div class="col-xs-2">
                  
                  <label for="asignar">ID Usuario:</label>
                  <input id="asignar" v-model="form.id" />
                </div>

                <div class="col-xs-2">

                  <select  v-model="form.rol" >
                    <option value="" disabled selected hidden>Escoger rol</option>
                    <option v-for="option in select" v-bind:value="option.id">
                      {{ option.name }}
                    </option>
                  </select>

                </div>
                  

              </div>
              
            </div>
                  
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-primary" type="submit">Asignar Rol</button> 
            </div>
          </div>
        </div>
      </div>

    </form>

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
