<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalles del Cliente</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-info">
                  <div class="widget-user-image">
                    <img
                      class="img-circle elevation-2"
                      src="/storage/img/guest.png"
                      alt="User Avatar"
                    />
                  </div>
                  <h3 class="widget-user-username">{{ client.name }}</h3>
                  <h5 class="widget-user-desc">Cliente</h5>
                </div>
                <div class="card-footer p-0">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link">
                        Correo
                        <span class="float-right">{{ client.email }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">
                        Telefono
                        <span class="float-right">{{ client.phone }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">
                        Tipo de Documento
                        <span class="float-right">{{ client.doc_type }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">
                        Documento
                        <span class="float-right">{{ client.document }}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">
                        Conjunto
                        <span class="float-right">{{ client.building }}</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card">
                     <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <i class="fas fa-file-invoice-dollar"></i> Extractos
                        <small class="float-right">Date: 2/10/2014</small>
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Estado del Pago</th>
                            <th>Saldo Disponible</th>
                            <th>Detalles</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>viernes, 1 de enero de 2021 12:00 a. m.</td>
                            <td>Pago</td>
                            <td>Completado</td>
                            <td>$6 000 000</td>
                            <td>
                              <inertia-link
                                :href="route('clientes/extractos', client.id)"
                              >
                                <button class="btn btn-sm btn-info">
                                  <i class="nav-icon fas fa-eye"></i>
                                </button>
                              </inertia-link>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                </div>
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
      client: {
        id: 10,
        name: "johan",
        email: "cliente@cliente.com",
        phone: 300303003,
        doc_type: "Cedula",
        document: 1002004004,
        building: "conjunto 1",
      },
    };
  },
};
</script>