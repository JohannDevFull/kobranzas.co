<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Notificaciones</h3>
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
                          @click="getAll(1, show)"
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
                <div class="dropdown-divider"></div>
                <div class="tab-pane active" id="timeline">
                  <div class="timeline timeline-inverse">
                    <div v-for="item in notifications">
                      <img
                        :src="parse(item.from).profile_photo_url"
                        alt="User Image"
                        class="fas img-circle elevation-2"
                      />

                      <div class="timeline-item">
                        <span class="time"
                          ><i class="far fa-clock"></i>
                          {{ timeElapsep(item.created_at) }}</span
                        >

                        <h3 class="timeline-header">
                          <jet-nav-link
                            v-if="$inertia.page.rol == 'Admin'"
                            :href="route('user.show', parse(item.from).id)"
                          >
                            {{ parse(item.from).name }}
                          </jet-nav-link>
                          <a v-else>
                            {{ parse(item.from).name }}
                          </a>
                          {{ item.action }} un
                          {{ item.notificable }}
                        </h3>

                        <div class="timeline-body">
                          <b>{{ parse(item.from).name }}</b>
                          {{ item.action }} un {{ item.notificable }} con
                          <b>{{ parse(item.info).name }}</b> del conjunto
                          <b>
                            <jet-nav-link
                              :href="
                                route(
                                  'conjuntos.show',
                                  parse(item.info).building_id
                                )
                              "
                            >
                              {{ parse(item.info).name_building }}
                            </jet-nav-link>
                          </b>
                          el
                          <br />
                          {{ toLocaleDateString(item.created_at) }}
                        </div>
                        <div class="timeline-footer">
                          <jet-nav-link
                            class="btn btn-warning btn-flat btn-sm"
                            :href="
                              route('llamadas.create', parse(item.info).id)
                            "
                          >
                            Ver
                          </jet-nav-link>
                        </div>
                      </div>
                    </div>
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
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
      notifications: [],
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
    this.getAll();
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
    timeElapsep(date) {
      var dateConverted = new Date(date);
      var CurrentDate = moment();
      var a = CurrentDate.diff(dateConverted, "seconds");
      if (a > 60) {
        let b = a / 60;
        if (b > 60) {
          let c = b / 60;
          if (c > 24) {
            let d = c / 24;
            return Math.round(d) + " día(s)";
          }
          return Math.round(c) + " hora(s)";
        }
        return Math.round(b) + " minuto(s)";
      }
      return a + " segundo(s)";
    },
    parse(parse) {
      parse = JSON.parse(parse);
      return parse;
    },
    getAll(page) {
      axios
        .get(
          "/notifications/paginate?page=" +
            page +
            "&show=" +
            this.show
        )
        .then((response) => {
          this.pagination = response.data.pagination;
          this.notifications = response.data.notifications.data;
        });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getAll(page);
    },
    toLocaleDateString(date) {
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        hour12: "true",
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