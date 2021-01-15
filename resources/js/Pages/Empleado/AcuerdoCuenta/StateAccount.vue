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
                    <i class="fas fa-globe"></i> LSA Abogados, Inc.
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
                    <strong>Johann Sebatian Ramirez</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
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
                      <th>N°. movimiento </th>
                      <th>Movimiento</th>
                      <th>Cargue</th>
                      <th>Abono</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Saldo inicial</td>
                      <td>$1,000,000</td>
                      <td></td> 
                      <td>$1,000,000</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Intereses inicial</td>
                      <td>250,000</td>
                      <td></td>
                      <td>$1,250,000</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Gastos cobranzas</td>
                      <td>187,500</td>
                      <td> </td>
                      <td>$1,437,500</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Abono Pago CU 01</td>
                      <td></td>
                      <td>127,900</td>
                      <td>$25.99</td>
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
                  <p class="lead">Payment Methods:</p>
                  <img src="/storage/img/credit/visa.png" alt="Visa">
                  <img src="/storage/img/credit/mastercard.png" alt="Mastercard">
                  <img src="/storage/img/credit/american-express.png" alt="American Express">
                  <img src="/storage/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
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
        props: ['sessions'],

        components: {
            AppLayout, 
        },
    }
</script>