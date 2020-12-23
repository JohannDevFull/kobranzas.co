<template> 
  <app-layout>
      <div>
        
        
            
        <div class="row">  
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de conjuntos</h3>

                <div class="card-tools"> 
                      <div class="input-group-append">
                        <inertia-link :href="route('conjuntos.create')">
                          <button class="btn btn-dark float-right">
                            <i class="fas fa-plus"></i> Agregar Conjunto
                          </button>
                        </inertia-link>
                      </div>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre </th>
                      <th>Direccion</th>
                      <th>Administrador</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr v-for="row in conjuntos"  >
                      <td> 
                          {{ row.id_building }}  
                      </td>
                      <td> 
                          {{ row.name_building }} 
                      </td>
                      <td> 
                          {{ row.address_building }}  
                      </td>
                      <td> 
                          {{ row.name}} 
                      </td>
                      

                      <td> 
                        <inertia-link class="" :href="route('conjuntos.show',row.id_building)" > 
                            <i class="nav-icon fas fa-eye text-info" style="padding:3px; "></i>  
                        </inertia-link>

                        <inertia-link class="" :href="route('conjuntos.edit',row.id_building)">
                            <i class="nav-icon fas fa-edit text-success" style="padding:6px;"></i>  
                        </inertia-link>
                        
                        <!-- <inertia-link class="" :href="route('conjuntos.create',row.id_building)">
                            <i class="nav-icon fas fa-trash text-danger" style="padding:6px;"></i> 
                        </inertia-link> -->
                        
                      </td>

                      
                    </tr>
                    <tr >  

                    </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->
          
          </div> 
          
        </div>

      </div> 
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout' 

export default {
  components: {
      AppLayout, 
  }, 
  created(){ 
    this.buscarResultados()
  },
  data(){
    return {
      conjuntos:[],
      buscar:'',
      setTimeoutBuscador: ''
    }
  },
  methods: {

      buscarResultados(){
          axios.get('/buscar/conjuntos',{
            params:{
              buscar:this.buscar
            }
          })
          .then( res => { 
              this.conjuntos=res.data 
          })
          .catch( error => {
              console.log( error.response )
          });
      },

      buscarKUP(){
          clearTimeout( this.setTimeoutBuscador )
          this.setTimeoutBuscador=setTimeout( this.buscarResultados ,360) 
      },
      buscarONC(){
        this.buscarResultados()
      }, 

  }
}
</script>

