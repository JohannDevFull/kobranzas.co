<template>
  <app-layout>
    <div>
      
      <div class="py-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" >
              <div class="card-header">
                <h3 class="card-title">Detalles conjunto</h3>

                <div class="card-tools"> 
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>
              </div>
              <div class="card-body" style="padding: 0px;"> 
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                     style="background: url('/storage/img/photo1.png') center center;height: 300px;">
                  <h3 class="widget-user-username text-right">{{conjunto.name}}</h3>
                  <h5 class="widget-user-desc text-right">Conjunto : {{conjunto.name_building}}</h5>
                </div>
                <div class="widget-user-image" style="position: absolute;top: 300px;">
                  <img class="img-circle"  v-bind:src="img" alt="User Avatar">
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">30</h5>
                      <span class="description-text">Acuerdos</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">34</h5>
                      <span class="description-text">Clientes</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">4</h5>
                      <span class="description-text">Pendientes</span>
                    </div>
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
                      <th>ID</th>
                      <th>Nombre </th>
                      <th>Correo</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr v-for="row in clientes" >
                      <td> 
                          {{ row.id }} 
                      </td>
                      <td> 
                          {{ row.name }} 
                      </td>
                      <td> 
                          {{ row.email}} 
                      </td>
                      <td> 
                          {{ row.phone_one }}  
                      </td>
                      

                      <td> 
                        <inertia-link class="" :href="route('llamadas.create',row.id)" > 
                            <i class="nav-icon fas fa-eye text-info" style="padding:3px; "></i>  
                        </inertia-link>

                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-hands-helping text-success" style="padding:6px;"></i>  
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
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout"; 

export default {
  props: ['conjunto'],
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


     
  
};
</script>