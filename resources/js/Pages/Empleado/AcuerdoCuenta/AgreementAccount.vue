<template>
  <app-layout>
    <div>
      
      <div class="py-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" >
              <div class="card-header">
                <h3 class="card-title">Cuenta, Acuerdos y Pagos</h3>

                <div class="card-tools"> 
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>
              </div>

              <div class="card-body" style="padding: 0px;"> 
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header " style="background-color: #e9ecef">
                        <div class="widget-user-image">
                          <img class="img-circle elevation-2" v-bind:src="img" >
                        </div>
                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username">Nombre:{{ cliente.name }} </h2> 
                        <h4 class="widget-user-desc">Conjunto : {{ conjunto.name_building }}  </h4>
                        <h6 class="widget-user-desc">Apartamento: {{ cliente.client_code }} </h6>
                      </div>
                <div class="widget-user-image" style="position: absolute;top: 200px;">
                  <img class="img-circle"  v-bind:src="img" alt="User Avatar">
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{acuerdo[0].description}}</h5>
                      <span class="description-text">Acuerdo</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  


                  <div class="col-sm-4 border-right"> 

                    <inertia-link  :href="route('state.account',cliente.user_id)" v-if="cuenta != 0">
                    <div class="description-block"  >

                        <h5 class="description-header">{{cuenta}}</h5>
                        <span class="description-text">Estado cuenta</span>
                    </div>
                    </inertia-link> 
                       
                    <div class="description-block" v-else>
                      <button type="button" style="margin-top:-4px" class="btn btn-success" @click="abrir()"  >
                            Crear Cuenta  
                      </button>
                    </div>
                    
                    <!-- /.description-block -->
                  </div>
                        


                  <!-- /.col -->
                  <div class="col-sm-4">
                    <inertia-link class="" :href="route('llamadas.create',cliente.user_id)">
                      <div class="description-block">
                        <h5 class="description-header">
                          <i class="nav-icon fas fa-phone text-success" style="padding:6px;"></i>
                        </h5>
                        <span class="description-text">Llamar</span>
                      </div>
                    </inertia-link> 
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
      </div>
      
      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de acuerdos</h3>

                <div class="card-tools" v-if="cuenta != 0"> 
                     
                        <inertia-link :href="route('conjuntos.create')">
                          <button class="btn btn-dark float">
                            <i class="fas fa-plus"></i> Crear nuevo acuerdo
                          </button>
                        </inertia-link>
                
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tipo de acuerdo</th>
                      <th>Fecha</th>
                      <th>Empleado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr  >
                    <!-- <tr v-for="row in clientes" > -->
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }}  
                      </td>
                      

                      <td> 
                        <!-- <inertia-link class="" :href="route('llamadas.create',row.id)" > 
                            <i class="nav-icon fas fa-eye text-info" style="padding:3px; "></i>  
                        </inertia-link>

                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-hands-helping text-success" style="padding:6px;"></i>  
                        </inertia-link>
                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-phone text-success" style="padding:6px;"></i> 
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

      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Pagos</h3>

                <div class="card-tools" v-if="cuenta != 0"> 
                     
                        <inertia-link :href="route('conjuntos.create')">
                          <button class="btn btn-dark float">
                            <i class="fas fa-plus"></i> Agregar pago 
                          </button>
                        </inertia-link>
                
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Empleado</th>
                      <th>Fecha</th>
                      <th>Resivo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr  >
                    <!-- <tr v-for="row in clientes" > -->
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }}  
                      </td>
                      

                      <td> 
                        <!-- <inertia-link class="" :href="route('llamadas.create',row.id)" > 
                            <i class="nav-icon fas fa-eye text-info" style="padding:3px; "></i>  
                        </inertia-link>

                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-hands-helping text-success" style="padding:6px;"></i>  
                        </inertia-link>
                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-phone text-success" style="padding:6px;"></i> 
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

      <create-account v-bind:cliente_id="cliente.user_id"/>


    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout"; 
import CreateAccount from "@/Kobranzas/CreateAccount"; 

export default {
  props: ['conjunto','cliente','cuenta','acuerdo'],
  components: {
    AppLayout, 
    CreateAccount, 
  },
  created(){ 
    this.buscarResultados()
  },
  data(){
    return {
      usuariosc:[],
      buscar:'',
      archivo:[],
      setTimeoutBuscador: '',
      img: '/storage/'+this.conjunto.profile_photo_path,
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
            console.log("exito al cargar resultados" );
          })
          .catch( error => {
              console.log( error.response )
          });
      },
      buscarKUP(){
          clearTimeout( this.setTimeoutBuscador )
          this.setTimeoutBuscador=setTimeout( this.buscarResultados ,360) 
      },
      abrir(){ 
        $("#CreateAccountModal").modal();
      },
     

  }


     
  
};
</script>