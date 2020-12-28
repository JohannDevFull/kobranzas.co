<template>
<app-layout>
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
                      <input type="text" class="form-control" v-model="form.phone" data-inputmask="'mask': ['999-999-9999 [x99999]', '+ 099 99 99 9999[9]-9999']" data-mask>
                    </div>
                    <!-- /.input group -->
                  </div>


                  <div class="form-group">
                    <label>Descripcion de la llamada</label>
                    <textarea v-model="form.texto" class="form-control" rows="0" placeholder="Escribir una breve descripcion...">
                    </textarea>
                  </div>

                  <div class="form-group" >
                        <label>Estado</label>
                        <span class="required">*</span>
                        <select class="form-control" v-model="selestado">
                          <option value="" disabled>Seleccione Estado</option>
                          <option v-for="option in estados" v-bind:value="option.id_state">
                            {{ option.description }}
                          </option>
                        </select>
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
                          <img class="img-circle elevation-2" v-bind:src="image" v-bind:alt="nameimg">
                        </div>

                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username">{{ cliente.name }} </h2> 
                        <h4 class="widget-user-desc">Conjunto : {{ conj }}  </h4>
                        <h6 class="widget-user-desc">Apartamento:  </h6>
                      </div>
                      <div class="card-footer p-0">
                        <ul class="nav flex-column">
                          <li class="nav-item"> 
                              Cedula  : {{ cliente.document }}
                          </li>
                          <li class="nav-item"> 
                              Correo  : {{ cliente.email }}
                          </li>
                          <li class="nav-item"> 
                              Telefono uno : {{ cliente.phone_one }}
                          </li>
                          <li class="nav-item"> 
                              Telefono dos : {{ cliente.phone_two }}
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Acuerdo actual 
                              <span class="float-right badge bg-danger" style="margin: auto;">ACUERDO ROTO</span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              Estado cuenta <span class="float-right badge bg-info">1.349.000</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div> 
                </div>

                <div class="row p-2 collapse" id="collapseExample">   
                    
                    <div class="col-sm-3">
                      <div class="form-group ">
                            <label>Cuotas</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <input type="number" class="form-control" min="1" max="24" placeholder="1" v-model="form.cuotas" >
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group ">
                            <label>Intereses</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Username" v-model="form.interese" >
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group ">
                            <label>Honorarios</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Username" v-model="form.honorario" >
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group " >
                        <label>Estado</label>
                        <span class="required">*</span>
                        <select class="form-control" v-model="selestado">
                          <option value="" disabled>Seleccione Estado</option>
                          <option v-for="option in estados" v-bind:value="option.id_state">
                            {{ option.description }}
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-8" style="margin:auto; ">
                      <div class="form-group">
                        <label>Observaciones del acuerdo </label>
                        <textarea v-model="form.observaciones" class="form-control" rows="0" placeholder="Escribir una breve descripcion...">
                        </textarea>
                      </div>
                    </div> 
                </div>

              </div>


             </form>

              <ul v-for="error in errors.errors">
                  <li class="required">{{ error[0] }}</li>
              </ul>
             
              <div class="col-sm-6" style="margin:auto; ">

                <div style="margin-left:100px;  ">
                  <button  class="btn  btn-success" type="submit" v-on:click="guardar">
                    Guardar llamada
                  </button>
                  
                  <button type="button" class="btn  btn-info " data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Agregar nuevo acuerdo
                  </button> 
                </div>

              </div>

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
                      <th>ID </th>
                      <th>Persona llamada</th>
                      <th>Telefono</th>
                      <th>Fecha / Hora</th>
                      <th>Nombre Empleado</th>
                      <th >Descripcion</th>
                      <th>Ver</th>
                    </tr>

                  </thead>

                  <tbody>
 
                    
                    <tr v-for="(row,index) in llamadas" > 
                      <td > {{ row.id_call }} </td>
                      <td style="width: 120px"> 
                        <div style='width:150px; overflow:hidden;'>
                        {{ row.name_call }} 
                        </div>
                      </td>
                      <td > {{ row.phone_call }} </td>
                      <td >{{ row.created_at }} </td>
                      <td  >{{ row.employee_id }} </td> 
                      <td style="width: 240px">
                        <div style='width:250px; overflow:hidden;'>
                            {{ row.description }}
                        </div> 
                      </td>
                      <td >

                        <button type="button" style="margin-top:-4px" class="btn" @click="ver(index)"  >
                            <i class="nav-icon fas fa-eye text-info"  ></i>         
                        </button>

                      </td>
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
    
    <call-modal v-bind:llamadas="llamadas" v-bind:ides="inde" v-bind:id="state" v-bind:name="form.name" />

  </div>
</app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout'
  import CallModal from '@/Kobranzas/CallModal' 
  import { Inertia } from '@inertiajs/inertia'

  export default {
    props: ['cliente','empleadoid','conjunto','llamadas'],

    components: {
        AppLayout, 
        CallModal,
    },
    created(){ 
      this.buscarEstados() 
      // this.callm()  
    },
    data() {
      return { 
        estados:[],  
        errors:[],  
        
        form: {

          name: this.cliente.name,
          phone: this.cliente.phone_one,
          texto: null,
          
          cuotas: null,
          intereses: null,
          honorarios: null,
          observaciones: null,
          
        },
        selestado:"",
        inde:0,
        index:"",
        state:0,
        image: "../../storage/img/avatar.png", 
        nameimg: " avatar user", 
        empleado:this.empleadoid, 
        conj:this.conjunto, 

      }
    },
    methods: {
      guardar(){
            
        var url = "/llamadas/store";
        axios
        .post(url, { 
          nombre: this.form.name,
          telefono: this.form.phone, 
          descripcion: this.form.texto,
          estado: this.selestado, 
          cliente: this.cliente.id, 
          idempleado: this.empleado, 
        })
        .then((response) => { 
          $(document).Toasts('create',{
            class: 'bg-success', 
            title: 'Llamada 000',
            subtitle: 'ok',
            body: 'Exito al registrar llamada.'
          }); 

          Inertia.reload({ only: ['llamadas'] },)
          Inertia.visit('/llamadas/create/'+this.cliente.id,{ preserveScroll: true }, { only: ['users'] });
        })
        .catch((error) => {
          this.errors = error.response.data;
          console.log("Este es el error"+error.response.data)
        });   
      },
      buscarEstados(){
        axios.get('/buscar/estados',{
              
        })
        .then( resp => { 
            this.estados=resp.data  
        })
        .catch( error => {
            console.log( error.response )
        });
      },
      Callm(){

        this.call=this.llamadas;      
      },
      cambio(){
        var x = document.getElementById("mydiv");
        if (x.style.display === "none") 
        {
            x.style.display = "block";
        } 
        else 
        {
            x.style.display = "none";
        }
      },
      ver(id){  
         
        this.inde=id; 
        
        this.state=this.llamadas[id].state_id; 

        $("#myModal").modal();
        
      },
    },
  }
</script>