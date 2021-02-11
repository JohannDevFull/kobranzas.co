<template>
  <div>
    <Widgets :infoName="{ infoName }" :info="{ info }" />
    <template>
      <div>
        <div class="row">
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
                      v-model="search"
                    />
                    <div class="input-group-append">
                      <button class="btn btn-default">
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
                      <th>Nombre</th>
                      <th>correo</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>

                  <tbody v-if="searchClient.length != 0">
                    <tr v-for="row in searchClient" :key="row.id">
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
                <h2
                  class="card-title"
                  v-if="searchClient.length == 0 && search != ''"
                >
                  no hay registros que contengan {{ search }} en el nombre.
                </h2>
                <h2
                  class="card-title"
                  v-else-if="searchClient.length == 0 && search == ''"
                >
                  no hay registros.
                </h2>
              </div>
              <!-- /.card-body -->
              <div class="card-footer"></div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import Widgets from "@/Pages/Dashboard/widgets";

export default {
  components: {
    Widgets,
  },
  data() {
    return {
      search: "",
      infoName: [
        "Nuevos Acuerdos",
        "Conjuntos",
        "Usuarios Registrados",
        "Unique Visitors",
      ],
      info: [],
      clients: [],
    };
  },
  created() {
    this.getInfo();
    this.getClients();
  },
  computed: {
    searchClient() {
        return this.clients.filter((clients) =>
          clients.name.toLowerCase().includes(this.search.toLowerCase())
        );
    },
  },

  methods: {
    getInfo() {
      axios.post("/dashboard/admin").then((response) => {
        this.info = response.data;
      });
    },
    getClients() {
      axios.post("/dashboard/getClients").then((response) => {
        this.clients = response.data;
      });
    },
  },
};
</script>