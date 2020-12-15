<template> 
      <div >
        
        
        <div class="row">  
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de  clientes</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                      <th>correo</th>
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

      </div> 
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 

    export default {
        components: {
            AppLayout, 
        },
        props:['clientes'],
    }
</script>

