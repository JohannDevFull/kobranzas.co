<template>
<app-layout>
     <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img
                      src="/storage/img/AdminLTELogo.png"
                      alt="AdminLTE Logo"
                      class="brand-image img-thumbnail elevation-3"
                      style="width: 36px;height: 36px;opacity: 0.8"
                    /> LSA Abogados, S.A.S.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Extracto
                  <address>
                    <strong>{{cliente.name}}</strong><br>
                    Conjunto: Azucena ,Trr 01 Apt 601<br>
                    Ciudad: Bogota DC<br>
                    Telefono uno: {{cliente.phone_one}}<br>
                    Telefono dos: {{cliente.phone_two}}<br>
                    Email: {{cliente.email}}
                  </address>
                </div> 
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>N°</th>
                      <th>Fecha</th>
                      <th>Tipo Movimiento</th>
                      <th>Descripcion Movimiento</th>
                      <th>Cargue</th>
                      <th>Abono</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(row,index) in extracto">
                        <td>{{row.id_movement}}</td>
                        <td>{{row.created_at}}</td>
                        <td>{{row.type_movement_id}}</td> 
                        <td>{{row.description_movement}}</td>
                        <td>{{row.valor_cargue}}</td>
                        <td>{{row.valor_abono}}</td>
                        <td>{{row.total_deuda}}</td>
                      </tr>
                     
                    

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  
                   
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
</app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout' 

    export default {
        props: ['cliente','extracto'],

        components: {
            AppLayout, 
        },
    }
</script>