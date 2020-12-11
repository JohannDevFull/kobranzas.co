<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <inertia-link :href="route('user.create')">
              <button class="btn btn-dark float-right">
                <i class="fas fa-plus"></i> Agregar Usuario
              </button>
            </inertia-link>
              <h3 class="card-title">Listado de Usuarios</h3>
              
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
                          @click="getUsers(1, show)"
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
                  <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter float-right">
                      <label
                        >Buscar por nombre o documento:<input
                          type="search"
                          class="form-control form-control-sm"
                          placeholder=""
                          aria-controls="example1"
                          v-model="name"
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
                            class="sorting_asc"
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            aria-sort="ascending"
                            aria-label="Rendering engine: activate to sort column descending"
                            style="width: 170px"
                          >
                            Nombre
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            aria-label="Browser: activate to sort column ascending"
                            style="width: 219px"
                          >
                            Correo
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"
                            style="width: 194px"
                          >
                            Tipo de Documento
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            aria-label="Engine version: activate to sort column ascending"
                            style="width: 143px"
                          >
                            Documento
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            aria-label="Telefono: activate to sort column ascending"
                            style="width: 101px"
                          >
                            Telefono
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            aria-label="Telefono: activate to sort column ascending"
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
                          v-for="(user, id) in searchUser"
                          :key="id"
                        >
                          <td class="sorting_1">{{ user.name }}</td>
                          <td>{{ user.email }}</td>
                          <td>
                            <select 
                              class="styleDoc"
                              :value="user.doc_type"
                              disabled
                            >
                              <option value="" disabled>Seleccione...</option>
                              <option value="cedula_ciudadania">
                               <b> Cédula de Ciudadanía</b>
                              </option>
                              <option value="cedula_extrangeria">
                                Cédula de Extrangería
                              </option>
                            </select>
                          </td>
                          <td>{{ user.document }}</td>
                          <td>{{ user.phone_one }}</td>
                          <td>
                            <jet-nav-link
                              :href="route('user.show', user.id)"
                              :active="route().current('user.show')"
                            >
                              <button class="btn btn-sm btn-info">
                                Ver&nbsp;<i class="nav-icon fas fa-eye"></i>
                              </button>
                            </jet-nav-link>
                            <button
                              class="btn btn-danger btn-sm"
                              @click="deleteUser(user.id)"
                              v-if="$inertia.page.rol == 'Admin'"
                            >
                              Eliminar<i class="nav-icon fas fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot v-if="name == ''">
                        <tr>
                          <th rowspan="1" colspan="1">Nombre</th>
                          <th rowspan="1" colspan="1">Correo</th>
                          <th rowspan="1" colspan="1">Tipo de Documento</th>
                          <th rowspan="1" colspan="1">Documento</th>
                          <th rowspan="1" colspan="1">Telefono</th>
                          <th rowspan="1" colspan="1">Acción</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="row" v-if="name == ''">
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
      name: "",
      show: 10,
      users: [],
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
    this.getUsers();
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
    searchUser() {
      return this.users.filter(
        (user) =>
          user.name.toLowerCase().includes(this.name.toLowerCase()) ||
          user.document.includes(this.name)
      );
    },
  },
  methods: {
    getUsers(page) {
      axios
        .get("user/paginate?page=" + page + "&show=" + this.show)
        .then((response) => {
          this.pagination = response.data.pagination;
          this.users = response.data.users.data;
        });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getUsers(page);
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
            axios.delete(`user/${idUser}`).then((response) => {
              this.getUsers();
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