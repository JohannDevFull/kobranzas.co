<template> 
  <div>
    
    <section class="content" >
      <div class="container-fluid"> 
        
        <div class="card card-default">
          
          <div class="card-header">
            <h3 class="card-title">Registro de llamadas </h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>

                <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                  <i class="fas fa-minus"></i>
                </button> 

              </div>
            </div>   

          </div>

 
          <div class="card-body"> 
             <form @submit.prevent="submit">
              <div   class="row">
                  
                <div class="col-sm-6">
                    
                  <div class="form-group">
                    <label>Nombre persona llamada</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Username" v-model="form.name" >
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label>Telefono llamada</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" v-model="form.phone" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group">
                    <label>Descripcion de la llamada</label>
                    <textarea v-model="form.text" class="form-control" rows="0" placeholder="Escribir una breve descripcion...">
                    </textarea>
                  </div>

                  <div class="row p-2">
                    <div class="col-sm-6">
                      <button type="button" class="btn  btn-info ">
                            Crer nuevo acuerdo
                      </button> 
                    </div>
                    <div class="col-sm-6">
                      <button  class="btn  btn-success" type="submit">
                        Guardar llamada
                      </button> 
                    </div>
                  </div>



                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Detalles cliente</label>
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header " style="background-color: #e9ecef">
                        <div class="widget-user-image">
                          <img class="img-circle elevation-2" v-bind:src="image" v-bind:alt="text">
                        </div>
                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username">{{ cliente.name }} </h2> 
                        <h4 class="widget-user-desc">Conjunto : Altos de alameda </h4>
                        <h6 class="widget-user-desc">Apartamento: 104 interio 9 </h6>
                      </div>
                      <div class="card-footer p-0">
                        <ul class="nav flex-column">
                          <li class="nav-item"> 
                              Telefono uno : {{ cliente.phone_one }}
                          </li>
                          <li class="nav-item"> 
                              Telefono dos : {{ cliente.phone_two }}
                          </li>
                          <li class="nav-item"> 
                              Telefono tres : {{ cliente.phone_two }}
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Otra informacion <span class="float-right badge bg-success">12</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Estado cuenta <span class="float-right badge bg-danger">1.349.000</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div> 
                </div>
              </div>
             </form>

          </div>

            
          <div class="card-footer">
          </div>

        </div> 

      </div><!-- /.container-fluid -->
    </section> 

    <section class="content" style="padding-top: 20px;">
      <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Historial de llamadas</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>134</td>
                      <td>Jim Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>494</td>
                      <td>Victoria Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>832</td>
                      <td>Michael Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>982</td>
                      <td>Rocky Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
    </section>
  </div> 
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 

    export default {
        props: ['cliente'],

        components: {
            AppLayout, 
        },
        data() {
          return { 
            form: {
              name: this.cliente.name,
              phone: this.cliente.phone_one,
              text: null,
              
            },
            image: "../../storage/img/avatar.png",
            text: "Logo de Javascript"

          }
        },
        methods: {
            submit(form){
              
              this.$inertia.post('llamada', this.form,{
                onSuccess:()=>{
                  alert("Llamada registrada");
                },
              })
                   
            },
        },
    }
</script>
