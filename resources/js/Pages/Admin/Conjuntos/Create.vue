<template>
  <app-layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin: auto;width: 400px;">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Editar Conjunto</h3>
            </div>

            <form role="form" method="POST" @submit.prevent="store">
              <div class="card-body">
                <div class="form-group">
                  <label>Nombre del Conjunto:</label>
                  <span class="required">*</span>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ingrese el nombre"
                    v-model="name"
                  />
                </div>
                <div class="form-group">
                  <label>Direccion del conjunto:</label>
                  <span class="required">*</span>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ingrese la direccion del conjunto"
                    v-model="address"
                  />
                </div>
               
                <div class="form-group">
                  <label>Telefono:</label>
                  <span class="required">*</span>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ingrese un numero de telefono"
                    v-model="phone"
                  />
                </div>

                <div class="form-group">
                  <label>Administrador</label>
                  <span class="required">*</span>
                  <select class="form-control" v-model="selected">
                    <option value="" disabled>Seleccione el Administrador</option>
                    <option v-for="option in administradores" v-bind:value="option.id">
                      {{ option.name }}
                    </option>
                  </select>
                </div>
                 
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
              
              
                <ul v-for="error in errors.errors">
                  <li class="required">{{ error[0] }}</li>
                </ul>
              
              <!-- <span  class="text-danger">{{
                error[0]
              }}</span> -->
            </form>

          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";

export default {
  components: {
    AppLayout,
    JetNavLink,
  },
  created(){ 
    this.buscarResultados()
  },
  data(){
    return { 
      selected:"",
      name: "",
      address: "",
      phone: "",
      administrador: "",
      administradores: [],
      errors: [],
    };
  },
  methods: {
    buscarResultados(){
      axios.get('/buscar/administradores',{
            params:{
              idconjunto:this.buscar
            }
      })
      .then( res => { 
          this.administradores=res.data 
          alert("holaaas mi mundo");
      })
      .catch( error => {
          console.log( error.response )
      });
    },
    reset(){
      this.name = "";
      this.address = "";  
      this.phone = ""; 
      this.administrador = ""; 
    },
    store() {
      var url = "/conjuntos/store";
      axios
        .post(url, { 
          nombre: this.name,
          direccion: this.address,
          telefono: this.phone, 
          administrador: this.selected, 
        })
        .then((response) => {
          this.reset();
          this.errors = [];
          // toastr.success("Usuario Registrado");

          $(document).Toasts('create', {
            class: 'bg-success', 
            title: 'Conjunto creado',
            subtitle: 'ok',
            body: 'Exito al crear nuevo conjunto.'
          }); 
          
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
    },
  },
};
</script>