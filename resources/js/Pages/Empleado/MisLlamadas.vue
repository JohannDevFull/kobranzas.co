<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <inertia-link :href="route('user.create')">
                <button class="btn btn-dark float-right btn-sm">
                  <i class="fas fa-plus"></i> Agregar Usuario
                </button>
              </inertia-link> -->
              <h3 class="card-title">Tus Llamadas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div
                id="example1_wrapper"
                class="dataTables_wrapper dt-bootstrap4"
              >
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length">
                      <label class="word-break"
                        >Filtrar por Cantidad
                        <select
                          name="example1_length"
                          aria-controls="example1"
                          class="custom-select custom-select-sm form-control form-control-sm"
                          v-model="show"
                          @click="getOwnCalls(1, show)"
                        >
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        </select>
                        Registros</label
                      >
                    </div>
                  </div>
                </div>
                <div class="row ajust">
                  <div class="col-sm-12">
                    <table
                      id="example1"
                      class="table table-bordered table-striped dataTable"
                      role="grid"
                      aria-describedby="example1_info"
                    >
                      <thead>
                        <tr role="row">
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 170px"
                          >
                            Cliente
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 219px"
                          >
                            Telefono
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 194px"
                          >
                            Conjunto
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 143px"
                          >
                            Tipo
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 101px"
                          >
                            Descripcion
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 101px"
                          >
                            Fecha
                          </th>
                           <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 101px"
                          >
                            Acción
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          role="row"
                          class="odd"
                          v-for="(call, id) in calls"
                          :key="id"
                        >
                          <td>
                            <jet-nav-link
                              :href="route('llamadas.agreement', call.client_id)"
                            >
                              {{ call.name_call }}
                            </jet-nav-link>
                          </td>
                          <td>{{ call.phone_call }}</td>
                          <td>
                            {{ call.name_building }}
                          </td>
                          <td>{{ camelCase(call.state_name) }}</td>
                          <td>{{ call.description }}</td>
                          <td>{{ toLocaleDateString(call.created_at)}}</td>
                          <td>     <jet-nav-link
                              :href="route('llamadas.create', call.client_id)"
                            >
                              <button class="btn btn-sm btn-info">
                                <i class="nav-icon fas fa-eye"></i>
                              </button>
                            </jet-nav-link></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Cliente</th>
                          <th rowspan="1" colspan="1">Telefono</th>
                          <th rowspan="1" colspan="1">Conjunto</th>
                          <th rowspan="1" colspan="1">Tipo</th>
                          <th rowspan="1" colspan="1">Descripcion</th>
                          <th rowspan="1" colspan="1">Fecha</th>
                          <th rowspan="1" colspan="1">Acción</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div
                      class="dataTables_info"
                      id="example1_info"
                      role="status"
                      aria-live="polite"
                    >
                      <p class="word-break">
                        Se muestran {{ pagination.from }} de {{ count }} de un
                        total de
                        {{ pagination.total }}
                        registros.
                      </p>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div
                      class="dataTables_paginate paging_simple_numbers"
                      id="example1_paginate"
                    >
                      <ul class="pagination flex-wrap">
                        <li
                          v-if="pagination.current_page > 1"
                          class="paginate_button page-item previous"
                          id="example1_previous"
                        >
                          <a
                            href="#"
                            @click.prevent="
                              changePage(pagination.current_page - 1)
                            "
                            aria-controls="example1"
                            data-dt-idx="0"
                            tabindex="0"
                            class="page-link"
                            >Atras</a
                          >
                        </li>
                        <li
                          class="paginate_button page-item"
                          v-for="page in pagesNumber"
                          :key="page"
                          v-bind:class="[page == isActived ? 'active' : '']"
                        >
                          <a
                            href="#"
                            @click.prevent="changePage(page)"
                            aria-controls="example1"
                            data-dt-idx="1"
                            tabindex="0"
                            class="page-link"
                            >{{ page }}</a
                          >
                        </li>

                        <li
                          v-if="pagination.current_page < pagination.last_page"
                          class="paginate_button page-item next"
                          id="example1_next"
                        >
                          <a
                            href="#"
                            @click.prevent="
                              changePage(pagination.current_page + 1)
                            "
                            aria-controls="example1"
                            data-dt-idx="7"
                            tabindex="0"
                            class="page-link"
                            >Siguiente</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
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
      show: 10,
      calls: [],
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
      offset: 3,
    };
  },
  created() {
    this.getOwnCalls();
  },
  computed: {
    count() {
      var counted = 0;
      counted = this.pagination.from + parseInt(this.show) - 1;
      if (counted > this.pagination.total) {
        counted = this.pagination.total;
      }
      return counted;
    },
    isActived() {
      return this.pagination.current_page;
    },
    pagesNumber() {
      if (!this.pagination.to) {
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }
      var to = from + this.offset * 2;
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    },
  },
  methods: {
    getOwnCalls(page) {
      axios
        .get("/llamadas/paginate?page=" + page + "&show=" + this.show)
        .then((response) => {
          this.pagination = response.data.pagination;
          this.calls = response.data.calls.data;
        });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getOwnCalls(page);
    },
    camelCase(str) {
  return str.replace(
    /\w\S*/g,
    function(txt) {
      return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    }
  );
  },
  toLocaleDateString(date) {
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      };
      var dateConverted = new Date(date).toLocaleString("es-US", options);
      return dateConverted;
    },
  
}
};
</script>
<style lang="css">
.word-break {
  word-wrap: break-word !important;
  white-space: normal !important;
}
</style>