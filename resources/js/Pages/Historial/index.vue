<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Historial</h3>
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
                      <label
                        >Filtrar por Cantidad
                        <select
                          name="example1_length"
                          aria-controls="example1"
                          class="custom-select custom-select-sm form-control form-control-sm"
                          v-model="show"
                          @click="getAudits(1, show,event,auditable)"
                        >
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        </select>
                        Registros</label
                      >
                    </div>
                    <div class="dataTables_length" id="example1_length">
                      <label
                        >Filtrar por Acción Realizada
                        <select
                          name="example1_length"
                          aria-controls="example1"
                          class="custom-select custom-select-sm form-control form-control-sm"
                          v-model="event"
                          @click="getAudits(1, show,event,auditable)"
                        >
                        <option value="all">Todas</option>
                          <option value="created">Creado</option>
                          <option value="updated">Actualizado</option>
                          <option value="deleted">Eliminado</option>
                          <option value="restored">Restaurado</option>
                          

                        </select>
                      </label>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div
                      class="dataTables_length float-right"
                      id="example1_length"
                    >
                      <label
                        >Filtrar por tipo
                        <select
                          name="example1_length"
                          aria-controls="example1"
                          class="custom-select custom-select-sm form-control form-control-sm"
                          v-model="auditable"
                          @click="getAudits(1, show,event,auditable)"
                        >
                         <option value="all">Todos</option>
                          <option value="User">Usuarios</option>
                          <option value="Client">Clientes</option>
                          <option value="Building">Conjuntos</option>
                          <option value="Call">Llamadas</option>
                          <option value="State">Estados</option>
                          <option value="Movement">Movimientos</option>
                          <option value="Agreement">Acuerdos</option>
                        </select>
                      </label>
                    </div>
                    <div
                      id="example1_filter"
                      class="dataTables_filter float-right"
                    >
                      <label
                        >Buscar por quién realizó el cambio:<input
                          type="search"
                          class="form-control form-control-sm"
                          placeholder=""
                          aria-controls="example1"
                          v-model="name"
                          @keyup="getAudits(1, show,event,auditable)"
                      /></label>
                    </div>
                  </div>
                </div>
                <div class="row">
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
                            Acción:
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 219px"
                          >
                            Se hizo:
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 194px"
                          >
                            Realizado por:
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 143px"
                          >
                            Fecha & Hora:
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 101px"
                          >
                            Ver Detalles
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                        v-if="audits.length!=0"
                          role="row"
                          class="odd"
                          v-for="(audit, id) in audits"
                          :key="id"
                        >
                          <td class="sorting_1">
                            {{ toSpanish(audit.event) }}
                          </td>
                          <td>{{ modelSpanish(audit.auditable_type) }}</td>
                          <td>{{ audit.user_name }}</td>
                          <td>{{ toLocaleDateString(audit.created_at) }}</td>

                          <td>
                            <jet-nav-link
                              :href="route('historial.detalles', audit.id)"
                              :active="route().current('historial.detalles')"
                            >
                              <button class="btn btn-sm btn-info">
                                <i class="nav-icon fas fa-eye"></i>
                              </button>
                            </jet-nav-link>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Acción</th>
                          <th rowspan="1" colspan="1">Se hizo</th>
                          <th rowspan="1" colspan="1">Realizado por</th>
                          <th rowspan="1" colspan="1">Fecha & Hora</th>
                          <th rowspan="1" colspan="1">Ver detalles</th>
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
                      Se muestran {{ pagination.from }} de {{ count }} de un
                      total de
                      {{ pagination.total }}
                      registros.
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                    <div
                      class="dataTables_paginate paging_simple_numbers"
                      id="example1_paginate"
                    >
                      <ul class="pagination">
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
      event:'all',

      auditable:'all',
      name: "",
      show: 10,
      audits: [],
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
    this.getAudits();
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
    searchAudit() {
      return this.audits.filter((audit) =>
        audit.nameUser.toLowerCase().includes(this.name.toLowerCase())
      );
    },
  },
  methods: {
    toSpanish(action) {
      switch (action) {
        case "created":
          return "Se Creó";
        case "updated":
          return "Se Actualizó";
        case "deleted":
          return "Se Eliminó";
        case "restored":
          return "Se Restauró";
        default:
          "Otro";
          break;
      }
    },
    modelSpanish(model) {
      switch (model) {
        case `App\\Models\\User`:
          return "Usuario";
        case `App\\Models\\Buildings`:
          return "Conjunto";
        case `App\\Models\\Calls`:
          return "LLamada";
        case `App\\Models\\Llamadas`:
          return "Llamadas";
        case `App\\Models\\State`:
          return "Estado";
            case `App\\Models\\Movements`:
          return "Movimiento";
            case `App\\Models\\Agreement`:
          return "Acuerdo";
        /*

         //agregar mas modelos

        */
        default:
          return "Otro";
      }
    },
    getAudits(page) {
      var event=this.event;
      var auditable=this.auditable;
      if(this.event=='all'){
        event='';
      }
      if(this.auditable=='all'){
        auditable='';
      }
      axios.get("/historial/getAudits?page=" + page + "&show=" + this.show+"&event="+event+"&auditable="+auditable+"&search="+this.name).then((response) => {
        this.pagination = response.data.pagination;
        this.audits = response.data.audits.data;
      });
    },

    toLocaleDateString(date) {
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        hour12: "false",
      };
      var dateConverted = new Date(date).toLocaleString("es-US", options);
      return dateConverted;
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getAudits(page);
    },
  },
};
</script>