<template>
  <app-layout>
    <div class="card">
      <div class="card-header">
        <h2 class="card-title" v-if="disabled">Detalles</h2>
        <h2 class="card-title" v-else>Editar</h2>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Nombre:</label>
          <input
            type="text"
            class="form-control"
            v-model="name"
            :disabled="disabled"
          />
        </div>
        <div class="form-group">
          <label>Correo:</label>
          <input
            type="text"
            class="form-control"
            v-model="email"
            :disabled="disabled"
          />
        </div>
        <!-- <div class="form-group">
          <label>Contraseña:</label>
          <input
            type="text"
            class="form-control"
            :value="userinfo.password"
            :disabled="disabled"
          />
        </div> -->
        <div class="form-group">
          <label>Telefono:</label>
          <input
            type="text"
            class="form-control"
            v-model="phone_one"
            :disabled="disabled"
          />
        </div>
        <div class="form-group">
          <label>Segundo Telefono:</label>
          <input
            type="text"
            class="form-control"
            v-model="phone_two"
            :disabled="disabled"
          />
        </div>
        <div class="form-group">
          <label>Tipo de Documento</label>
          <select class="form-control" v-model="selected" :disabled="disabled">
            <option value="" disabled>Seleccione...</option>
            <option value="cedula_ciudadania">Cédula de Ciudadanía</option>
            <option value="cedula_extrangeria">Cédula de Extrangería</option>
          </select>
        </div>
        <div class="form-group">
          <label>Documento:</label>
          <input
            type="text"
            class="form-control"
            v-model="document"
            :disabled="disabled"
          />
        </div>
      </div>
      <div class="card-footer">
        <button
          class="btn btn-sm btn-warning"
          @click="toggle()"
          v-if="disabled"
        >
          Editar
        </button>

        <button class="btn btn-sm btn-info" v-if="!disabled" @click="updateUser(userinfo.id)">Actualizar</button>
        <ul v-for="error in errors.errors">
          <li class="required">{{ error[0] }}</li>
        </ul>
        <button
          class="btn btn-sm btn-danger"
          v-if="!disabled"
          @click="cancel()"
        >
          Cancelar
        </button>
        <button
          class="btn btn-sm btn-outline-danger float-right"
          @click="deleteUser(userinfo.id)"
        >
          Eliminar
        </button>
      </div>

      <div class="card bg-gradient-info my-2 mx-4">
        <div class="card-header">
          <h3 class="card-title">Mas información</h3>

          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block">
          Rol: {{ userinfo.roles[0].name }}
        </div>
        <div class="card-body" style="display: block">
          Creado el: {{ userinfo.created_at }}
        </div>
        <div class="card-body" style="display: block">
          Actualizado el: {{ userinfo.updated_at }}
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";

export default {
  props: ["userinfo"],
  components: {
    AppLayout,
    JetNavLink,
  },
  data() {
    return {
      disabled: true,
      selected: this.userinfo.doc_type,
      name: this.userinfo.name,
      email: this.userinfo.email,
      document: this.userinfo.document,
      phone_one: this.userinfo.phone_one,
      phone_two: this.userinfo.phone_two,
      errors: [],
    };
  },
  methods: {
    toggle() {
      this.disabled = !this.disabled;
    },
    cancel() {
      this.toggle();
      this.selected = this.userinfo.doc_type;
      this.name = this.userinfo.name;
      this.email = this.userinfo.email;
      this.document = this.userinfo.document;
      this.phone_one = this.userinfo.phone_one;
      this.phone_two = this.userinfo.phone_two;
      this.errors=[];
    },
    updateUser(idUser) {
      axios
        .put(`/user/${idUser}`, {
          nombre: this.name,
          correo: this.email,
          tipo_de_documento: this.selected,
          documento: this.document,
          telefono: this.phone_one,
          phone_two: this.phone_two,
        })
        .then((response) => {
          this.$inertia.visit(`/user/${this.userinfo.id}`);
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
    },
    deleteUser(idUser) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "¿Estás Seguro que quieres eliminar a este usuario?",
          text:
            "Una vez eliminado el usuario NO podras ver su informacion de nuevo!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí, Eliminar!",
          cancelButtonText: "No, Cancelar!",
          reverseButtons: true,
          showLoaderOnConfirm: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios.delete(`/user/${idUser}`).then((response) => {
              this.$inertia.visit("/user");
              swalWithBootstrapButtons.fire(
                "Eliminado!",
                `El usuario ha sido eliminado.`,
                "success"
              );
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelado",
              "El usuario NO se ha eliminado ten más cuidado.",
              "error"
            );
          }
        });
    },
  },
};
</script>