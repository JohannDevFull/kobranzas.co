<template>
  <div>
    <button
      type="button"
      class="btn btn-outline-dark float-right"
      data-toggle="modal"
      data-target="#ClientModal"
    >
      <a class="toolip" style="top: 9px; right: 21px">
        <i class="fas fa-question-circle"></i>
        <span class="tooltiptext">
          Debe haber creado un conjunto antes para agregar clientes.
        </span>
      </a>
      Registro Masivo de Clientes
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="ClientModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="ClientModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ClientModalLabel">Subida Masiva de Clientes</h5>
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
                      <span class="file-info" v-if="!files || !files.length"
                        >Ningún Archivo Seleccionado...</span
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



                    <ul v-for="error in errors.errors">
                      <li class="required">{{ error[0] }}</li>
                    </ul>
                  </div>
                </div>

              <!--  -->
          
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Cancelar
            </button>
                                <button
                      type="submit"
                      class="btn btn-success"
                      @click="importar()"
                      
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

            
          </div>
        </div>
      </div>
    </div>
    <!--  -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      files: null,
      import_file: "",
      errors: {},
    };
  },
  methods: {
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

      axios
        .post("/importar/clientes", formData, {
          headers: { "content-type": "multipart/form-data" },
        })
        .then((response) => {
          if (response.status === 200) {
            Swal.fire({

              icon: "success",
              title: "Los Clientes han sido subidos",
              showConfirmButton: false,
              timer: 1500,
            });
            this.errors = {};
            this.files = null;
            console.log("subido");
            $('#ClientModal').modal('hide');
          }
        })
        .catch((error) => {
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