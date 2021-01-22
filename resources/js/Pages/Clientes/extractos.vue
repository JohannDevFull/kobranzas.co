<template>
  <app-layout>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Extractos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="card card-widget widget-user-2">
          
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
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      From
                      <address>
                        <strong>Admin, Inc.</strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        Phone: (804) 123-5432<br />
                        Email: info@almasaeedstudio.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong>John Doe</strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        Phone: (555) 539-1037<br />
                        Email: john.doe@example.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice #007612</b><br />
                      <br />
                      <b>Order ID:</b> 4F3S8J<br />
                      <b>Payment Due:</b> 2/22/2014<br />
                      <b>Account:</b> 968-34567
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Debe</th>
                            <th>Haber</th>
                            <th>Saldo</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>viernes, 1 de enero de 2021 12:00 a. m.</td>
                            <td>Cuota de Renting</td>
                            <td>$1'000.000</td>
                            <td>$400.00</td>
                            <td>$6'000.000</td>
                           
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">
                      <a
                        href="invoice-print.html"
                        target="_blank"
                        class="btn btn-default"
                        ><i class="fas fa-print"></i> Print</a
                      >
                      <button type="button" class="btn btn-success float-right">
                        <i class="far fa-credit-card"></i> Submit Payment
                      </button>
                      <button
                        type="button"
                        class="btn btn-primary float-right"
                        style="margin-right: 5px"
                      >
                        <i class="fas fa-download"></i> Generate PDF
                      </button>
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

export default {
  components: {
    AppLayout,
  },
  data() {
    return {
    
    };
  },
};
</script>