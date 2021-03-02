<template> 
  <app-layout>
      <div>
        
        
        <div class="row">  
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de  clientes</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                      <input
                          class="form-control  float-right"
                          type="search"
                          placeholder="Buscar por nombre ..."
                          aria-label="Search"
                          v-model="buscar"
                          @keyup="buscarKUP"
                      >
                      <div class="input-group-append">
                        <button v-on:click="buscarONC" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Apt</th>
                      <th>Nombre </th>
                      <th>correo</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr v-for="row in clientes" >
                      <td> 
                          {{ row.client_code }}  
                      </td>
                      <td> 
                          {{ row.name }} 
                      </td>
                      <td> 
                          {{ row.email}} 
                      </td>
                      <td> 
                          {{ row.description }}  
                      </td>
                      

                      <td> 
                        <inertia-link class="" :href="route('llamadas.agreement',row.id)" > 
                            <i class="nav-icon fas fa-eye text-info" style="padding:3px; "></i>  
                        </inertia-link>

                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-phone text-success" style="padding:6px;"></i> 
                        </inertia-link>
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
      clientes:[],
      buscar:'',
      setTimeoutBuscador: ''
    }
  },
  methods: {

      buscarResultados(){

          axios.get('/buscar',{
            params:{
              buscar:this.buscar
            }
          })
          .then( res => { 
              this.clientes=res.data 
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

