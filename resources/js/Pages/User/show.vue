<template>
  <app-layout>

    <div class="card">
      <div class="card-header">
        <h2 class="card-title" v-if="disabled">Detalles</h2>
        <h2 class="card-title" v-else>Editar</h2>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Nombre</label>
          <input
            type="text"
            class="form-control"
            :value="user.name"
            :disabled="disabled"
            @click="toggle()"
          />
        </div>
        <div class="form-group">
          <label>Correo</label>
          <input
            type="text"
            class="form-control"
            :value="user.email"
            :disabled="disabled"
            @click="toggle()"
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
        <button class="btn btn-sm btn-info" v-if="!disabled">Actualizar</button>
        <button
          class="btn btn-sm btn-danger"
          v-if="!disabled"
          @click="disabled = true"
        >
          Cancelar
        </button>
      </div>

      <div class="card bg-gradient-info  my-2 mx-4">
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
        <div class="card-body" style="display: block">Rol: {{user.roles[0].name}}</div>
        <div class="card-body" style="display: block">Creado el: {{user.created_at}}</div>
        <div class="card-body" style="display: block">Actualizado el: {{user.updated_at}}</div>
        <!-- /.card-body -->
      </div> 
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";

export default {
  props: ["user"],
  components: {
    AppLayout,
    JetNavLink,
  }, 
  data() {
    return {
      disabled: true,
    };
  },
  methods: {
    toggle() {
      this.disabled = false;
    },
  }, 
};
</script>