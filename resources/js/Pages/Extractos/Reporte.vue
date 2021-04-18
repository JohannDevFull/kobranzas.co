<template>
  <app-layout>
    <div>
      

      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Reporte de accion</h3>

            <div class="card-tools">

              <div class="input-group input-group-sm" >
                
                <div class="input-group-append">
                  <button
                      @click="exportar()"
                      type="button"
                      class="btn btn-info"
                    >
                      Descargar Excel
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
                  <th>CODIGO</th>
                  <th>NOMBRE</th>
                  <th>ESTADO</th>
                  <th>HONORARIOS</th>
                  <th>FECHA PAGO</th>
                  <th>VALOR PAGO</th>
                  <th>GASTOS COBRANZAS</th>
                  <th>IVA 19%</th>
                  <th>SALDO G. COBRANZAS</th>
                  <th>SALDO DEUDA</th>
                </tr>
              </thead>

              <tbody>
                <tr v-for="row in clients">
                  <td>
                    {{ row.codigo }}
                  </td>
                  <td>
                    {{ row.nombre }}
                  </td>
                  <td>
                    {{ row.estado }}
                  </td>
                  <td>
                    {{ row.honorarios }}
                  </td>
                  <td>
                    {{ row.fecha_pago }}
                  </td>
                  <td>
                    {{ row.valor_pago }}
                  </td>
                  <td>
                    {{ row.gastos_cobranzas }}
                  </td>
                  <td>
                    {{ row.iva }}
                  </td>
                  <td>
                    {{ row.total_cobranzas }}
                  </td>
                  <td>
                    {{ row.saldo_total }}
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
  props: ["conjunto", "id", "conjuntoinfo"],
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
        .get("/reporte/"+this.id, {
          
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
    exportar(id) {
      var page = window.location.origin + "/conjunto/informe/"+this.id;
      window.open(page);
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