<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recordatorios</h3>
            </div>
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
                          @click="getReminders(1, show)"
                        >
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        </select>
                        Registros</label
                      >
                      <label class="word-break"
                        >Filtrar por Estado
                        <select
                          name="example1_length"
                          aria-controls="example1"
                          class="custom-select custom-select-sm form-control form-control-sm"
                          v-model="status"
                          @click="getReminders(1, show)"
                        >
                          <option value="0">Pendientes</option>
                          <option value="1">Realizados</option>
                        </select>
                      </label>
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
                            v-if="status==0"
                          >
                            Continuar
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 101px"
                            v-if="status==0"
                          >
                            Hecho
                          </th>
                           <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 101px"
                            v-else
                          >
                            Deshacer
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          role="row"
                          class="odd"
                          v-for="(reminder, id) in reminders"
                          :key="id"
                        >
                          <td>
                            <jet-nav-link
                              :href="
                                route('llamadas.agreement', reminder.client_id)
                              "
                            >
                              {{ reminder.name }}
                            </jet-nav-link>
                          </td>

                          <td>{{ reminder.description }}</td>
                          <td>{{ toLocaleDateString(reminder.date) }}</td>
                          <td
                            v-if="status==0"
                          
                          >
                            <jet-nav-link
                              :href="
                                route('llamadas.create', reminder.client_id)
                              "
                            >
                              <button class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                              </button>
                            </jet-nav-link>
                          </td>
                          <td
                          v-if="status==0">
                            <button
                              @click="toggle(reminder.id)"
                              class="btn btn-sm btn-primary"
                            >
                              <i class="far fa-check-square"></i>
                            </button>
                          </td>
                           <td v-else>
                            <button
                              @click="toggle(reminder.id)"
                              class="btn btn-sm btn-danger"
                            >
                              <i class="far fa-window-close"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Cliente</th>
                          <th rowspan="1" colspan="1">Descripcion</th>
                          <th rowspan="1" colspan="1">Fecha</th>
                          <th rowspan="1" colspan="1" v-if="status==0">Continuar</th>
                          <th rowspan="1" colspan="1" v-if="status==0">Hecho</th>
                          <th rowspan="1" colspan="1" v-else>Deshacer</th>
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
          </div>
        </div>
      </div>
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
      status: 0,
      show: 10,
      reminders: [],
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
    this.getReminders();
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
    toggle(id) {
      this.reminders.splice(id, 1);
      axios.put("/toggleReminder", {
        id: id,
      }).then(()=>{
        this.getReminders(this.page);
      });
    },
    getReminders(page) {
      axios
        .post(
          "/getReminders?page=" +
            page +
            "&show=" +
            this.show +
            "&status=" +
            this.status
        )
        .then((response) => {
          this.pagination = response.data.pagination;
          this.reminders = response.data.reminders.data;
        });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getReminders(page);
    },

    toLocaleDateString(date) {
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
      };
      var dateConverted = new Date(date).toLocaleString("es-US", options);
      return dateConverted;
    },
  },
};
</script>
<style lang="css">
.word-break {
  word-wrap: break-word !important;
  white-space: normal !important;
}
</style>