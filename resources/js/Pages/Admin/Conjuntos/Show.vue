<template>
  <app-layout>
    <div>
      <div class="py-12">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <div class="card-header">
            <h3 class="card-title">Detalles conjunto</h3>

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
          <div class="card-body" style="padding: 0px">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div
              class="widget-user-header text-white"
              style="
                background: url('/storage/img/photo1.png') center center;
                height: 300px;
              "
            >
              <h3 class="widget-user-username text-right">
                {{ conjuntoinfo.name }}
              </h3>
              <h5 class="widget-user-desc text-right">
                Conjunto : {{ conjunto.name_building }}
              </h5>
              <h5 class="widget-user-desc text-right">
                Telefono : {{ conjunto.phone_building }}
              </h5>
              <h5 class="widget-user-desc text-right">
                direccion : {{ conjunto.address_building }}
              </h5>
              <h5 class="widget-user-desc text-right">
                Valor administracion : {{ conjunto.valor_administracion }}
              </h5>
              <h5 class="widget-user-desc text-right">
                Gastos cobranzas : {{ conjunto.gastos_cobranzas }}%
              </h5>
            </div>
            <div
              class="widget-user-image"
              style="position: absolute; top: 300px"
            >
              <img
                class="img-circle"
                v-bind:src="conjuntoinfo.profile_photo_url"
                alt="User Avatar"
              />
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">x</h5>
                  <span class="description-text">Acuerdos</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->

              <div class="col-sm-4 border-right">
                <div class="description-block" v-if="num === 0">
                  <div class="uploadFile">
                    <div class="fileSel" :class="filexist">
                      <div
                        class="fileSel-button"
                        :class="button"
                        style="float: right"
                      >
                        Cargar Archivo
                      </div>
                      <input
                        type="file"
                        name="file"
                        id="file"
                        ref="file"
                        @change="onFileChange"
                        accept="xls,xlsx"
                      />
                      <span class="file-info" v-if="!files || !files.length">
                        Ningún Archivo Seleccionado...
                      </span
                      >
                      <div v-else>
                        <span
                          class="file-info"
                          v-for="file in files"
                          :key="file.name"
                        >
                          {{ file.name }}
                        </span>
                      </div>
                    </div>
                  </div>

                  <div style="padding: 5px; margin: auto">
                    <button
                      type="submit"
                      class="btn btn-success"
                      @click="importar()"
                      :class="(loading?'disabled':'')"

                    >
                      Cargar clientes
                    </button>

                    <button
                      @click="exportar()"
                      type="button"
                      class="btn btn-info"
                    >
                      Descargar plantilla
                    </button>
                          <div v-if="loading" style="text-align:center;">
                    <div class="loader"></div>
                    </div>
                    <ul v-for="error in errors.errors">
                      <li class="required">{{ error[0] }}</li>
                    </ul>
                  </div>
                </div>

                <div class="description-block" v-if="num > 0">
                  <h5 class="description-header">{{ num }}</h5>
                  <span class="description-text">Clientes</span>
                </div>

                <!-- /.description-block -->
              </div>

              <!-- /.col -->
              <div class="col-sm-4">

                <inertia-link
                  class=""
                  :href="route('conjuntos.reporte', conjunto.id_building)"
                >
                <div class="description-block">
                  <h5 class="description-header">x</h5>
                  <span class="description-text">Reporte</span>
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
            <h3 class="card-title">Lista de clientes</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 250px">
                <input
                  class="form-control float-right"
                  type="search"
                  placeholder="Buscar por nombre ..."
                  aria-label="Search"
                  v-model="buscar"
                  @keyup="buscarKUP"
                />
                <div class="input-group-append">
                  <button v-on:click="buscarONC" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 400px">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>Apt</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                <tr v-for="row in clients">
                  <td>
                    {{ row.client_code }}
                  </td>
                  <td>
                    {{ row.name }}
                  </td>
                  <td>
                    {{ row.email }}
                  </td>
                  <td>
                    {{ row.description }}
                  </td>

                  <td>
                    <inertia-link
                      class=""
                      :href="route('llamadas.agreement', row.id)"
                    >
                      <i
                        class="nav-icon fas fa-eye text-info"
                        style="padding: 3px"
                      ></i>
                    </inertia-link>

                    <inertia-link
                      class=""
                      :href="route('llamadas.create', row.id)"
                    >
                      <i
                        class="nav-icon fas fa-phone text-success"
                        style="padding: 6px"
                      ></i>
                    </inertia-link>
                  </td>
                </tr>
                <tr></tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  props: ["conjunto", "num", "conjuntoinfo"],
  components: {
    AppLayout,
  },
  created() {
    this.buscarResultados();
  },
  data() {
    return {
      files: null,
      usuariosc: [],
      clients: [],
      buscar: "",
      import_file: "",
      setTimeoutBuscador: "",
      img: "/storage/" + this.conjunto.profile_photo_path,
      errors: {},
      loading:false

    };
  },
  methods: {
    buscarResultados() {
      axios
        .get("/buscar/clients", {
          params: {
            buscar: this.buscar,
            conjunto: this.conjunto.id_building,
          },
        })
        .then((res) => {
          this.clients = res.data;
        })
        .catch((error) => {
          console.log(error.response);
        });
    },

    buscarKUP() {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(this.buscarResultados, 360);
    },
    buscarONC() {
      this.buscarResultados();
    },
    onFileChange(event) {
      this.files = event.target.files;
    },
    exportar() {
      var page = window.location.origin + "/conjuntos/template";
      window.open(page);
    },
    importar() {
      if (this.files) {
        let formData = new FormData();
        formData.append("file", this.files[0]);
        this.loading=true;
        axios
          .post("/importar/clientes", formData, {
            headers: { "content-type": "multipart/form-data" },
          })
          .then((response) => {
            if (response.status === 200) {
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Los Clientes han sido subidos",
                showConfirmButton: false,
                timer: 1500,
              });
              this.errors = {};
              this.files = null;
        this.loading=false;

          this.$inertia.visit(`/conjuntos/show/${this.conjunto.id_building}`);
             
            }
          })
          .catch((error) => {
        this.loading=false;

            this.uploading = false;
            this.errors = error.response.data;
            console.log("check error: ", this.errors);
          });
      } else {
        this.errors = {
          errors: [["No se ha subido ningún archivo."]],
        };
        return;
      }
    },
  },
  computed: {
    filexist() {
      return {
        fileExist: this.files != null,
        "": this.files == null,
      };
    },
    button() {
      return {
        buttonWhenIsActived: this.files != null,
        "": this.files == null,
      };
    },
  },
};
</script>
<style lang="css">
</style>