 <template>
  <app-layout>
    <div class="py-12">
      <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8"

      >
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Crear nuevo conjunto</h3>
            </div>

            <div class="card-body" style="padding: 0px">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div
                class="widget-user-header text-white"
                style="
                  background: url('/storage/img/photo1.png') center center;
                  height: 200px;
                "
              ></div>

              <form role="form" method="POST" @submit.prevent="store">
                <div class="card-body row">
                  <div class="col-sm-6">
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
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Valor administracion:</label>
                      <span class="required">*</span>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Ingrese el valor de la administracion"
                        v-model="administracion"
                      />
                    </div>

                    <div class="form-group">
                      <label>% Gastos cobranzas:</label>
                      <span class="required">*</span>
                      <input
                        type="number"
                        class="form-control"
                        min="1"
                        max="20"
                        v-model="gastos"
                      />
                    </div>

                    <div class="form-group">
                      <label>Administrador</label>
                      <span class="required">*</span>
                      <select class="form-control" v-model="selected">
                        <option value="" disabled>
                          Seleccione el Administrador
                        </option>
                        <option
                          v-for="option in administradores"
                          v-bind:value="option.id"
                        >
                          {{ option.name }}
                        </option>
                      </select>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">
                    Crear conjunto
                  </button>
                </div>
                <!-- /.card-body -->

                <div class="card-footer"></div>

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
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";
import { Inertia } from '@inertiajs/inertia'
export default {
  props: ["conjunto"],
  components: {
    AppLayout,
    JetNavLink,
  },
  created() {
    this.buscarResultados();
  },
  data() {
    return {
      administradores: [],
      selected: "",
      name: "",
      address: "",
      phone: "",
      gastos:"",
      administracion: "",
      errors: [],
    };
  },
  watch:{
    administracion: function() { 
      var res=this.formatear(this.administracion);
      this.administracion=res;
      return this.administracion;
    },
   
  },
  methods: {
    buscarResultados() {
      axios
        .get("/buscar/administradores", {
          params: {
            buscar: this.buscar,
          },
        })
        .then((res) => {
          this.administradores = res.data;
        })
        .catch((error) => {
          console.log(error.response);
        });
    }, 
    store() {
      var url = "/conjuntos/store";

      var val_admin=this.sinFormatNumber(this.administracion);

      axios
        .post(url, {
          nombre: this.name,
          direccion: this.address,
          telefono: this.phone,
          administracion: val_admin,
          gastos: this.gastos,
          admin: this.selected,

        })
        .then((response) => {
          this.errors = [];
          // toastr.success("Usuario Registrado");
             Swal.fire({
            icon: "success",
            title: "Conjunto creado",
            text:"Éxito al crear nuevo Conjunto",
            showConfirmButton: false,
            timer: 1500,
          });
          
          Inertia.get('/conjuntos');
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
    },
    formatear(input_val){

          // check for decimal
          if (input_val.indexOf(".") >= 0) 
          {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = this.formatNumber(left_side);

            // validate right side
            right_side = this.formatNumber(right_side);
            
            // On blur make sure 2 numbers after decimal
            if (blur === "blur") 
            {
              right_side += "00";
            }
            
            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "." + right_side; 
            return input_val;
          } 
          else 
          {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = this.formatNumber(input_val); 
            return input_val;
          }
    },
    formatNumber(n){
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
    sinFormatNumber(n){ 
      return n.replace(/,/g, "");
    },
  },
};
</script>