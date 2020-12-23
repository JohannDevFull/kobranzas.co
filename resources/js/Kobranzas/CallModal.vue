<template>
  <div  >
    

      <!-- Modal -->
        <div class="modal fade " id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles llamada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            
              <div class="modal-body">

                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Nombre cliente: Johann Ramirez</h3>

                    <div class="card-tools">
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputName">Nombre persona llamada</label>
                          <input type="text" id="inputName" class="form-control" value="AdminLTE">
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputName">Telefono llamada</label>
                          <input type="text" id="inputName" class="form-control" value="AdminLTE">
                        </div>
                      </div>
                                            
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="inputDescription">Descripcion llamada</label>
                          <textarea id="inputDescription" class="form-control" rows="3">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                        </div>
                      </div>
     
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="inputStatus">Status</label>
                          <select class="form-control custom-select">
                            <option selected disabled>Select one</option>
                            <option>On Hold</option>
                            <option>Canceled</option>
                            <option selected>Success</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="inputClientCompany">Empleado</label>
                          <input type="text" id="inputClientCompany" class="form-control" value="Deveint Inc">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputProjectLeader">Fecha / Hora</label>
                          <input type="text" id="inputProjectLeader" class="form-control" value="Tony Chicken">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
