<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Clientes</h3>
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
                    <div id="example1_filter" class="float-right">
                      <label class="sear-label"
                        >Buscar por nombre o documento:<input
                          type="search"
                          class="form-control form-control-sm"
                          placeholder=""
                          aria-controls="example1"
                      /></label>
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
                            Nombre
                          </th>
                          <th
                            tabindex="0"
                            aria-controls="example1"
                            rowspan="1"
                            colspan="1"
                            style="width: 170px"
                          >
                            Detalles
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr role="row" class="odd">
                          <td>{{client.name}}</td>
                          <td>
                            <inertia-link :href="route('clientes.detalles',client.id)">
                              <button class="btn btn-sm btn-info">
                                <i class="nav-icon fas fa-eye"></i>
                              </button>
                            </inertia-link>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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
export default {
  components: {
    AppLayout,
  },
  data() {
    return {
        client:{
            id:10,
            name:'johan'
        }
    };
  },
};
</script>
