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
              <!--  -->
            
              <import-clients />
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
                    <label for="cliente">
                      Cliente
                      <a class="toolip">
                        <i class="fas fa-question-circle"></i>
                        <span class="tooltiptext">
                          El rol cliente permiritirá ver los pagos realizados.
                        </span>
                      </a>
                    </label>
                    <input
                      v-model="checked"
                      class="input100"
                      id="trabajador"
                      name="doc_type"
                      type="radio"
                      :value="'employee'"
                    />
                    <label for="trabajador"
                      >Trabajador
                      <a class="toolip"
                        ><i class="fas fa-question-circle"></i>
                        <span class="tooltiptext">
                          El rol trabajador permiritirá administrar llamadas,
                          tareas y acuerdos.
                        </span>
                      </a>
                    </label>
                    <input
                      v-model="checked"
                      class="input100"
                      id="adminConjunto"
                      name="doc_type"
                      type="radio"
                      :value="'group'"
                    />
                    <label for="adminConjunto"
                      >Admin de conjunto
                      <a class="toolip"
                        ><i class="fas fa-question-circle"></i>
                        <span class="tooltiptext">
                          El rol administrado Conjunto permiritirá ver la lista
                          de los usuarios de un conjunto y los estados de
                          cuenta.
                        </span>
                      </a>
                    </label>
                    <input
                      v-model="checked"
                      class="input100"
                      id="admin"
                      name="doc_type"
                      type="radio"
                      :value="'admin'"
                    />
                    <label for="admin"
                      >Administrador
                      <a class="toolip"
                        ><i class="fas fa-question-circle"></i>
                        <span class="tooltiptext">
                          El rol administrador permitirá administrar y crear
                          usuarios, conjuntos, registros y llamadas.
                        </span>
                      </a>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nombres:</label>
                  <span class="required">*</span>
                  <input
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
                <div class="form-group" v-if="checked == 'client'">
                  <label>Estado</label>
                  <span class="required">*</span>
                  <select class="form-control" v-model="selestado">
                    <option value="" disabled>Seleccione Estado</option>
                    <option
                      v-for="option in estados"
                      v-bind:value="option.id_state"
                    >
                      {{ option.description }}
                    </option>
                  </select>
                </div>
                <div class="form-group" v-if="checked == 'client'">
                  <label>Conjunto</label>
                  <span class="required">*</span>
                  <select class="form-control" v-model="selected_conjunto">
                    <option value="" disabled>Seleccione Conjunto</option>
                    <option
                      v-for="opt in conjuntos"
                      v-bind:value="opt.id_building"
                    >
                      {{ opt.name_building }}
                    </option>
                  </select>
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
import ImportClients from "@/Kobranzas/ImportClients";

export default {
  components: {
    AppLayout,
    JetNavLink,
    ImportClients,
  },
  data() {
    return {
      conjuntos: [],
      estados: [],
      selected: "",
      checked: "client",
      name: "",
      email: "",
      pass: "",
      selected: "",
      selestado: "",
      selected_conjunto: "",
      document: "",
      phone_one: "",
      phone_two: "",
      client_code: "",
      contract_number: "",
      errors: [],
      showModal: false,
    };
  },
  created() {
    this.buscarEstados();
    this.buscarConjuntos();
  },
  methods: {
    reset() {
      this.name = "";
      this.email = "";
      this.pass = "";
      this.selected = "";
      this.selected_conjunto = "";
      this.selestado = "";
      this.document = "";
      this.phone_one = "";
      this.phone_two = "";
      this.client_code = "";
      this.contract_number = "";
    },
    buscarEstados() {
      axios
        .get("/buscar/estados", {})
        .then((resp) => {
          this.estados = resp.data;
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
    buscarConjuntos() {
      axios
        .get("/buscar/conjuntos", {})
        .then((res) => {
          this.conjuntos = res.data;
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
    store() {
      var url = "/user/store";
      axios
        .post(url, {
          role: this.checked,
          nombre: this.name,
          correo: this.email,
          contraseña: this.pass,
          tipo_de_documento: this.selected,
          documento: this.document,
          telefono: this.phone_one,
          phone_two: this.phone_two,
          codigo_de_cliente: this.client_code,
          numero_de_contrato: this.contract_number,
          conjunto: this.selected_conjunto,
          estado: this.selestado,
        })
        .then((response) => {
          this.reset();
          this.errors = [];
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "El usuario ha sido creado!",
            showConfirmButton: false,
            timer: 1500,
          });
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
    },
    startTransitionModal() {
      vm.$refs.backdrop.classList.toggle("d-block");
      vm.$refs.modal.classList.toggle("d-block");
    },
    endTransitionModal() {
      vm.$refs.backdrop.classList.toggle("show");
      vm.$refs.modal.classList.toggle("show");
    },
  },
};
</script>
