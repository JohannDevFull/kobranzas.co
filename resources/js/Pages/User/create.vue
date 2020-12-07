<template>
  <app-layout>
    <p class="lead">
      Los campos con el signo (<span style="color: red">*</span>) son
      obligatorios.
    </p>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registro de usuarios</h3>
              
            </div>

            <form role="form" method="POST" @submit.prevent="store">
              <div class="card-body">
                <div class="form-group">
                  <label>Tipo de Usuario</label>
                  <span class="required">*</span>
                  <div class="contenedorradio">
                    <input
                      v-model="checked"
                      class="input100"
                      id="cliente"
                      type="radio"
                      name="doc_type"
                      checked=""
                      :value="'client'"
                    />
                    <label for="cliente">Cliente</label>
                    <input
                      v-model="checked"
                      class="input100"
                      id="trabajador"
                      name="doc_type"
                      type="radio"
                      :value="'employee'"
                    />
                    <label for="trabajador">Trabajador</label>
                    <input
                      v-model="checked"
                      class="input100"
                      id="adminConjunto"
                      name="doc_type"
                      type="radio"
                      :value="'groupadmin'"
                    />
                    <label for="adminConjunto">Admin de conjunto</label>
                    <input
                      v-model="checked"
                      class="input100"
                      id="admin"
                      name="doc_type"
                      type="radio"
                      :value="'admin'"
                    />
                    <label for="admin">Administrador</label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nombres:</label>
                  <span class="required">*</span>
                  <input
                    name="name"
                    type="text"
                    class="form-control"
                    placeholder="Ingrese el nombre"
                    v-model="name"
                  />
                </div>
                <div class="form-group">
                  <label>Direccion de correo:</label>
                  <span class="required">*</span>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Ingrese la direccion de correo"
                    v-model="email"
                  />
                </div>
                <div class="form-group">
                  <label>Contraseña:</label>
                  <span class="required">*</span>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Ingrese la contraseña"
                    v-model="pass"
                  />
                </div>
                <div class="form-group">
                  <label>Tipo de Documento</label>
                  <span class="required">*</span>
                  <select class="form-control" v-model="selected">
                    <option value="" disabled>Seleccione...</option>
                    <option value="cedula_ciudadania">
                      Cédula de Ciudadanía
                    </option>
                    <option value="cedula_extrangeria">
                      Cédula de Extrangería
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Numero de Documento:</label>
                  <span class="required">*</span>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ingrese el numero de documento"
                    v-model="document"
                  />
                </div>
                <div class="form-group">
                  <label>Telefono:</label>
                  <span class="required">*</span>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ingrese un numero de telefono"
                    v-model="phone_one"
                  />
                </div>
                <div class="form-group">
                  <label>Otro Telefono:</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ingrese un segundo telefono"
                    v-model="phone_two"
                  />
                </div>
                <div v-if="checked == 'client'">
                  <div class="form-group">
                    <label>Código del Cliente:</label>
                    <span class="required">*</span>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Ingrese el código del cliente"
                      v-model="client_code"
                    />
                  </div>
                  <div class="form-group">
                    <label>Número de contrato:</label>
                    <span class="required">*</span>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Ingrese el Numero de Contrato"
                      v-model="contract_number"
                    />
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
              <span v-for="error in errors" class="text-danger">{{
                error
              }}</span>
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
  data() {
    return {
      selected: "",
      checked: "client",
      name: "",
      email: "",
      pass: "",
      selected: "",
      document: "",
      phone_one: "",
      phone_two: "",
      client_code: "",
      contract_number: "",
      errors: [],
    };
  },
  methods: {
    reset(){
      this.name='';
      this.email='';
      this.pass='';
      this.selected='';
      this.document='';
      this.phone_one='';
      this.phone_two='';
      this.client_code='';
      this.contract_number='';
    },
    store() {
      var url = "/user/store";
      axios
        .post(url, {
          role: this.checked,
          name: this.name,
          email: this.email,
          password: this.pass,
          doc_type: this.selected,
          document: this.document,
          phone_one: this.phone_one,
          phone_two: this.phone_two,
          client_code: this.client_code,
          contract_number: this.contract_number,
        })
        .then((response) => {
          this.reset();
          this.errors = [];
          // toastr.success("Usuario Registrado");
          
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
    },
  },
};
</script>