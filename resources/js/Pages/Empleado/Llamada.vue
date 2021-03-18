<template>
  <app-layout>
    <div>
      <section class="content">
        <div class="container-fluid">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Registro de llamadas</h3>

              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="collapse"
                  style="border: 1px gray solid; height: 100%; margin: 0px"
                >
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <form @submit.prevent="submit">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nombre persona llamada</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"
                            ><i class="fas fa-user"></i
                          ></span>
                        </div>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Username"
                          v-model="form.name"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Telefono llamada</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"
                            ><i class="fas fa-phone"></i
                          ></span>
                        </div>
                        <input
                          type="text"
                          class="form-control"
                          v-model="form.phone"
                          data-inputmask="'mask': ['999-999-9999 [x99999]', '+ 099 99 99 9999[9]-9999']"
                          data-mask
                        />
                      </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group">
                      <label>Descripcion de la llamada</label>
                      <textarea
                        v-model="form.texto"
                        class="form-control"
                        rows="0"
                        placeholder="Escribir una breve descripcion..."
                      >
                      </textarea>
                    </div>

                    <div class="form-group">
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
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Detalles cliente</label>
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div
                          class="widget-user-header"
                          style="background-color: #e9ecef"
                        >
                          <div class="widget-user-image">
                            <img
                              class="img-circle elevation-2"
                              v-bind:src="cliente.profile_photo_url"
                              v-bind:alt="nameimg"
                            />
                          </div>

                          <!-- /.widget-user-image -->
                          <h2 class="widget-user-username">
                            {{ cliente.name }}
                          </h2>
                          <h4 class="widget-user-desc">
                            Conjunto : {{ conj }}
                          </h4>
                          <h6 class="widget-user-desc">
                            Apartamento: {{ cliente.client_code }}
                          </h6>
                        </div>
                        <div class="card-footer p-0">
                          <ul class="nav flex-column">
                            <li class="nav-item">
                              Cedula : {{ cliente.document }}
                            </li>
                            <li class="nav-item">
                              Correo :
                              <a :href="`mailto:${cliente.email}`">{{
                                cliente.email
                              }}</a>
                            </li>
                            <li class="nav-item">
                              Telefono uno :
                              <a :href="`tel:${cliente.phone_one}`">{{
                                cliente.phone_one
                              }}</a>
                            </li>
                            <li class="nav-item">
                              Telefono dos :
                              <a :href="`tel:${cliente.phone_two}`">{{
                                cliente.phone_two
                              }}</a>
                            </li>
                            <li class="nav-item">
                              <inertia-link
                                class="nav-link"
                                :href="route('llamadas.agreement', cliente.id)"
                              >
                                Acuerdo actual
                                <span
                                  class="float-right badge bg-danger"
                                  style="margin-top: 6px"
                                >
                                  {{ acuerdo[0].description }}
                                </span>
                              </inertia-link>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                Estado cuenta
                                <span
                                  class="float-right badge bg-info"
                                  style="margin-top: 6px"
                                >
                                  {{ cuenta_total }}</span
                                >
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
                  </div>

                  <div class="row p-2 collapse" id="collapseExample">
                    <div class="row" style="background-color: green">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Abono</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-sort-amount-up-alt"></i
                              ></span>
                            </div>
                            <input
                              type="text"
                              class="form-control"
                              v-model="abono_decimal"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Total deuda</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-coins"></i
                              ></span>
                            </div>
                            <input
                              type="text"
                              class="form-control"
                              v-model="total"
                              disabled
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Cuotas</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-sort-amount-up-alt"></i
                              ></span>
                            </div>
                            <input
                              type="number"
                              class="form-control"
                              min="1"
                              max="24"
                              v-model="form.cuotas"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Dia fecha pago</label>
                          <span class="required">*</span>
                          <select class="form-control" v-model="dia_pago">
                            <option value="" disabled>Seleccione Estado</option>
                            <option value="6">6</option>
                            <option value="16">16</option>
                            <option value="28">28</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Valor subcuota</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-dollar-sign"></i
                              ></span>
                            </div>
                            <input
                              type="text"
                              class="form-control"
                              v-model="sub_cuota"
                              disabled
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Valor administracion</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-dollar-sign"></i
                              ></span>
                            </div>
                            <input
                              type="text"
                              class="form-control"
                              v-model="form.administracion"
                              disabled
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Valor total cuota</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-dollar-sign"></i
                              ></span>
                            </div>
                            <input
                              type="text"
                              class="form-control"
                              v-model="valor_cuota"
                              disabled
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
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
                      </div>
                      <div class="col-sm-8" style="margin: auto">
                        <div class="form-group">
                          <label>Observaciones del acuerdo </label>
                          <textarea
                            v-model="form.observaciones"
                            class="form-control"
                            rows="0"
                            placeholder="Escribir una breve descripcion..."
                          >
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row"></div>
                  </div>
                </div>
              </form>

              <ul v-for="error in errors.errors">
                <li class="required">{{ error[0] }}</li>
              </ul>

              <div class="col-sm-6" style="margin: auto">
                <div style="margin-left: 100px" v-if="acuerdo_bol === 0">
                  <button
                    class="btn btn-success"
                    type="submit"
                    v-on:click="guardar"
                  >
                    Guardar llamada
                  </button>
                  <button
                    class="btn btn-warning"
                    data-toggle="modal"
                    data-target="#recordatorio"
                  >
                    Crear Recordatorio
                  </button>

                  <button
                    type="button"
                    class="btn btn-info"
                    data-toggle="collapse"
                    data-target="#collapseExample"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                    v-on:click="cambiar"
                  >
                    Agregar nuevo acuerdo
                  </button>
                </div>

                <div style="margin-left: 100px" v-else>
                  <button
                    class="btn btn-success"
                    type="submit"
                    v-on:click="guardar_acuerdo"
                  >
                    Guardar Acuerdo
                  </button>

                  <button
                    type="button"
                    class="btn btn-danger"
                    data-toggle="collapse"
                    data-target="#collapseExample"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                    v-on:click="cambiar"
                  >
                    Cancelar acuerdo
                  </button>
                </div>
              </div>
            </div>

            <div class="card-footer"></div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>
      <div
        class="modal fade"
        id="recordatorio"
        tabindex="-1"
        role="dialog"
        aria-labelledby="recordatorio"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crear recordatorio</h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!--  -->
              <div>
                <label>Nombre</label>
                <input
                  class="form-control disabled"
                  type="text"
                  :value="form.name"
                  disabled="true"
                />
                <label>Fecha</label>
                <input
                  class="form-control"
                  type="datetime-local"
                  v-model="dateReminder"
                />
                
                <label>Descripción</label>
                <textarea
                  class="form-control disabled"
                  type="text"
                  v-model="desReminder"
                ></textarea>
              </div>

              <ul v-for="error in errReminder.errors">
                <li class="required">{{ error[0] }}</li>
              </ul>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-success"
                @click="createReminder()"
              >
                Guardar
              </button>
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cancelar
              </button>
            </div>
          </div>
        </div>
      </div>

      <section class="content" style="padding-top: 20px">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Historial de llamadas</h3>

                <div class="card-tools"></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Persona llamada</th>
                      <th>Telefono</th>
                      <th>Fecha / Hora</th>
                      <th>Nombre Empleado</th>
                      <th>Descripcion</th>
                      <th>Ver</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr v-if="!llamadas"></tr>

                    <tr v-else v-for="(row, index) in llamadas">
                      <td>{{ row.id_call }}</td>
                      <td style="width: 120px">
                        <div style="width: 150px; overflow: hidden">
                          {{ row.name_call }}
                        </div>
                      </td>
                      <td>{{ row.phone_call }}</td>
                      <td>{{ row.created_at }}</td>
                      <td>{{ row.employee_id }}</td>
                      <td style="width: 240px">
                        <div style="width: 250px; overflow: hidden">
                          {{ row.description }}
                        </div>
                      </td>
                      <td>
                        <button
                          type="button"
                          style="margin-top: -4px"
                          class="btn btn-success"
                          @click="ver(index)"
                        >
                          <i class="nav-icon fas fa-eye "></i>
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

      <call-modal
        v-bind:llamadas="llamadas"
        v-bind:ides="inde"
        v-bind:id="state"
        v-bind:kk="llam"
        v-bind:name="form.name"
      />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import CallModal from "@/Kobranzas/CallModal";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: [
    "cliente",
    "empleadoid",
    "conjunto",
    "admin",
    "llamadas",
    "acuerdo",
    "cuentaTotal",
    "name",
  ],

  components: {
    AppLayout,
    CallModal,
  },
  created() {
    this.buscarEstados();
    this.totalCuenta();
    this.administracionDecimal();
  },
  data() {
    return {
      desReminder: "",
      dateReminder: "",
      errReminder: [],
      estados: [],
      errors: [],

      form: {
        name: this.cliente.name,
        phone: this.cliente.phone_one,
        texto: null,

        intereses: null,
        honorarios: null,
        observaciones: null,

        deuda: this.cuentaTotal,
        total_deuda: 0,
        cuotas: 0,
        subcuota: 0,
        administracion: this.admin,
        valorCuota: 0,
        abono: 0,
      },
      acuerdo_bol: 0,
      abono_decimal: 0,

      selestado: "",
      dia_pago: "",
      cuenta_total: "",
      inde: 0,
      llam: -1,
      index: "",
      state: 0,
      image: "../../storage/img/avatar.png",
      nameimg: " avatar user",
      empleado: this.empleadoid,
      nombreempleado: this.name,
      conj: this.conjunto,
    };
  },
  watch: {
    abono_decimal: function () {
      var res = this.formatear(String(this.abono_decimal));

      this.form.abono = this.sinFormatNumber(this.abono_decimal);

      this.abono_decimal = res;
    },
  },
  computed: {
    total: function () {
      var num = this.form.deuda - this.form.abono;
      var total = this.formatear(String(num));
      this.form.total_deuda = num;
      return total;
    },
    sub_cuota: function () {
      if (this.form.cuotas === 0) {
        return (this.form.subcuota = 0);
      } else {
        var num = this.form.total_deuda / this.form.cuotas;
        var n = num.toFixed(2);
        this.form.subcuota = n;
        return this.formatear(String(n));
      }
    },
    valor_cuota: function () {
      if (this.form.subcuota === 0) {
        return (this.form.valorCuota = 0);
      } else {
        var num = parseFloat(this.form.subcuota) + parseFloat(this.admin);
        var n = num.toFixed(2);
        return this.formatear(String(n));
      }
    },
  },
  methods: {
    createReminder() {
      this.errReminder = [];
      axios
        .post("/createReminder", {
          client_id: this.cliente.id,
          descripcion: this.desReminder,
          fecha: this.dateReminder,
        })
        .then(() => {
          Swal.fire({
            icon: "success",
            title: "Recordatorio Creado",
            text: "Éxito al Registrar Recotdatorio",
            showConfirmButton: false,
            timer: 1500,
          });
          $("#recordatorio").modal("hide");
          this.desReminder = "";
          this.dateReminder = "";
          this.errReminder = [];
        })
        .catch((err) => {
          this.errReminder = err.response.data;
        });
    },
    guardar() {
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
          Swal.fire({
            icon: "success",
            title: "Llamada Registrada",
            text: "Éxito al Registrar Llamada",
            showConfirmButton: false,
            timer: 1500,
          });
          Inertia.reload({ only: ["llamadas"] });
          Inertia.visit(
            "/llamadas/create/" + this.cliente.id,
            { preserveScroll: true },
            { only: ["users"] }
          );
        })
        .catch((error) => {
          this.errors = error.response.data;
          console.log("Este es el error" + error.response.data);
        });
    },
    guardar_acuerdo() {
      var url = "/llamadas/store_acuerdo";
      axios
        .post(url, {
          nombre: this.form.name,
          telefono: this.form.phone,
          descripcion: this.form.texto,
          estado: this.selestado,
          cliente: this.cliente.id,
          idempleado: this.empleado,
          nombre_empleado: this.nombreempleado,
          dia_fecha_pago: this.dia_pago,
          administracion: this.sinFormatNumber(this.admin),

          deuda_actual: this.cuentaTotal,
          cuotas: this.form.cuotas,
          abono: this.form.abono,
          valor_cuota: this.sinFormatNumber(this.valor_cuota),
          observaciones: this.form.observaciones,
        })
        .then((response) => {
          Swal.fire({
            icon: "success",
            title: "Acuerdo Registrado",
            text: "Éxito al Registrar Acuerdo",
            showConfirmButton: false,
            timer: 1500,
          });
          Inertia.reload({ only: ["llamadas"] });
          Inertia.visit(
            "/llamadas/create/" + this.cliente.id,
            { preserveScroll: true },
            { only: ["users"] }
          );
          setTimeout(() => {
            axios
              .post("/llamadas/sendEmails", { notification: response.data.id })
              .catch((err) => {
                console.log(err);
              });
          }, 400);
        })
        .catch((error) => {
          this.errors = error.response.data;
          console.log("Este es el error" + error.response.data);
        });
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
    Callm() {
      this.call = this.llamadas;
    },
    totalCuenta() {
      var num = String(this.cuentaTotal);
      var nn = this.formatear(num);
      this.cuenta_total = nn;
    },
    administracionDecimal() {
      var num = String(this.admin);
      var nn = this.formatear(num);
      this.form.administracion = nn;
    },
    cambiar() {
      if (this.acuerdo_bol === 0) {
        this.acuerdo_bol = 1;
      } else {
        this.acuerdo_bol = 0;
      }
    },
    ver(id) {
      this.inde = id;
      this.llam = 0;

      this.state = this.llamadas[id].state_id;

      $("#myModalCall").modal();
    },
    formatear(input_val) {
      // check for decimal
      if (input_val.indexOf(".") >= 0) {
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
        if (blur === "blur") {
          right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side;
        return input_val;
      } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = this.formatNumber(input_val);
        return input_val;
      }
    },
    formatNumber(n) {
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    sinFormatNumber(n) {
      return n.replace(/,/g, "");
    },
  },
};
</script>