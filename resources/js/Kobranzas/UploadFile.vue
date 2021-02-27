<template>
  <div>
    <button
      type="button"
      class="btn btn-outline-dark float-right"
      data-toggle="modal"
      data-target="#UploadModal"
    >
      Subir Archivo
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="UploadModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="UploadModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="UploadModalLabel">Subir Archivo</h5>
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
              <span>Descripción</span>
              <input
                class="form-control mb-2"
                placeholder="Descripción"
                type="text"
                name="des"
                id="des"
                v-model="description"
              />
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
              <div v-if="loading" style="text-align: center">
                <div class="loader"></div>
              </div>

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
              :class="loading ? 'disabled' : ''"
            >
              Subir Archivo
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
  props: ["cliente_id"],
  data() {
    return {
      description: "",
      files: null,
      import_file: "",
      errors: {},
      loading: false,
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
        formData.append("descripcion", this.description);
        formData.append("client_id", this.cliente_id);
        this.loading = true;
        axios
          .post("/uploadFiles", formData, {
            headers: { "content-type": "multipart/form-data" },
          })
          .then((response) => {
            if (response.status === 200) {
              Swal.fire({
                icon: "success",
                title: "Archivo subido",
                showConfirmButton: false,
                timer: 1500,
              });
              this.errors = {};
              this.files = null;
              this.loading = false;
              $("#UploadModal").modal("hide");
              this.$inertia.visit(`/llamadas/agreement/${this.cliente_id}`);
            }
          })
          .catch((error) => {
            this.loading = false;

            this.uploading = false;
            this.errors = error.response.data;
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
