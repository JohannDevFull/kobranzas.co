<template>
  <app-layout>
    <div>
      
      <div class="py-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" >
              <div class="card-header">
                <h3 class="card-title">Cuenta, Acuerdos y Pagos</h3>

                <div class="card-tools"> 
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>
              </div>

              <div class="card-body" style="padding: 0px;"> 
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header " style="background-color: #e9ecef;">
                        <div class="widget-user-image" style="position: absolute;left: 70px">
                          <img class="img-circle elevation-2" v-bind:src="img" >
                        </div>
                        <!-- /.widget-user-image -->
                        <h2 class="widget-user-username">Nombre:{{ cliente.name }} </h2> 
                        <h4 class="widget-user-desc">Conjunto : {{ conjunto.name_building }}  </h4>
                        <h6 class="widget-user-desc">Apartamento: {{ cliente.client_code }} </h6>
                      </div>
                
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{acuerdo[0].description}}</h5>
                      <span class="description-text">Acuerdo</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  


                  <div class="col-sm-4 border-right"> 

                    <inertia-link  :href="route('state.account',cliente.user_id)" v-if="cuenta != 0">
                    <div class="description-block"  >

                        <h5 class="description-header">{{ saldo}}</h5>
                        <span class="description-text">Estado cuenta</span>
                    </div>
                    </inertia-link> 
                        
                    <div class="description-block" v-else>
                      <button type="button" style="margin-top:-4px" class="btn btn-success" @click="abrir()"  >
                            Crear Cuenta  
                      </button>
                    </div>
                    
                    <!-- /.description-block -->
                  </div>
                        


                  <!-- /.col -->
                  <div class="col-sm-4">
                    <inertia-link class="" :href="route('llamadas.create',cliente.user_id)">
                      <div class="description-block">
                        <h5 class="description-header">
                          <i class="nav-icon fas fa-phone text-success" style="padding:6px;"></i>
                        </h5>
                        <span class="description-text">Llamar</span>
                      </div>
                    </inertia-link> 
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
      </div>
      
      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de acuerdos</h3>

                <div class="card-tools" v-if="cuenta != 0"> 
                     
                        <inertia-link :href="route('conjuntos.create')">
                          <button class="btn btn-dark float">
                            <i class="fas fa-plus"></i> Crear nuevo acuerdo
                          </button>
                        </inertia-link>
                
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tipo de acuerdo</th>
                      <th>Fecha</th>
                      <th>Empleado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody> 
                    <tr v-if="!acuerdos">  
                    </tr>

                    <tr  v-for="(row,index) in acuerdos" v-else>  
                      <td> 
                          {{ row.id_agreement }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{ row.created_at }} 
                      </td>
                      <td> 
                          {{ row.employee_id }}  
                      </td>
                      

                      <td> 
                        <button type="button" style="margin-top:-4px" class="btn btn-success" @click="ver(index)"  >
                            <i class="nav-icon fas fa-eye text-info"  ></i>         
                        </button>

                       <!--  <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-hands-helping text-success" style="padding:6px;"></i>  
                        </inertia-link> -->
                        
                      </td>
                    </tr>
                    
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->    
      </div> 

      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Pagos</h3>

                <div class="card-tools" v-if="cuenta != 0"> 
                     
                        <inertia-link :href="route('conjuntos.create')">
                          <button class="btn btn-dark float">
                            <i class="fas fa-plus"></i> Agregar pago 
                          </button>
                        </inertia-link>
                
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" style="border: 1px gray solid ;height: 100%;margin:0px; ">
                      <i class="fas fa-minus"></i>
                    </button> 
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Empleado</th>
                      <th>Fecha</th>
                      <th>Resivo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr  >
                    <!-- <tr v-for="row in clientes" > -->
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }} 
                      </td>
                      <td> 
                          {{  }}  
                      </td>
                      

                      <td> 
                        <!-- <inertia-link class="" :href="route('llamadas.create',row.id)" > 
                            <i class="nav-icon fas fa-eye text-info" style="padding:3px; "></i>  
                        </inertia-link>

                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-hands-helping text-success" style="padding:6px;"></i>  
                        </inertia-link>
                        <inertia-link class="" :href="route('llamadas.create',row.id)">
                            <i class="nav-icon fas fa-phone text-success" style="padding:6px;"></i> 
                        </inertia-link> -->
                      </td>

                      
                    </tr>
                    <tr >  

                    </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->    
      </div> 

      <create-account v-bind:cliente_id="cliente.user_id"/>
      <agreement-modal v-bind:acuerdo="acuerdos" v-bind:id="inde"  v-bind:boleno="bol" v-bind:totalCuenta="cuenta" />


    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import AgreementModal from '@/Kobranzas/AgreementModal' 
import CreateAccount from "@/Kobranzas/CreateAccount"; 

export default {
  props: ['conjunto','cliente','cuenta','acuerdo','photo','acuerdos'],
  components: {
    AppLayout, 
    CreateAccount, 
    AgreementModal, 
  },
  created(){ 
    this.buscarResultados()
    this.saldoDecimal()
  },
  data(){
    return {
      usuariosc:[],
      buscar:'',
      saldo:this.cuenta,
      archivo:[],
      setTimeoutBuscador: '',
      img:this.photo,
      inde:0,
      bol:-1,
    }
  },
  methods: {
      buscarResultados(){

          axios.get('/buscar',{
            params:{
              buscar:this.buscar
            }
          })
          .then( res => { 
            console.log("exito al cargar resultados" );
          })
          .catch( error => {
              console.log( error.response )
          });
      },
      buscarKUP(){
          clearTimeout( this.setTimeoutBuscador )
          this.setTimeoutBuscador=setTimeout( this.buscarResultados ,360) 
      },
      abrir(){ 
        $("#CreateAccountModal").modal();
      },
      saldoDecimal(){ 
        var num=String(this.cuenta);
        var nn=this.formatear(num);
        this.saldo=nn;
      },
      formatear(input_val){

      // check for decimal
      if (input_val.indexOf(".") >= 0) 
      {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = this.formatNumber(left_side);

        // validate right side
        right_side = this.formatNumber(right_side);
        
        // On blur make sure 2 numbers after decimal
        if (blur === "blur") 
        {
          right_side += "00";
        }
        
        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side; 
        return input_val;
      } 
      else 
      {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = this.formatNumber(input_val); 
        return input_val;
      }

    },
    formatNumber(n){
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
    sinFormatNumber(n){ 
      return n.replace(/,/g, "");
    },
    ver(id){  
         
      this.inde=id; 
      this.bol=0; 

      // this.state=this.llamadas[id].state_id; 

      $("#myModal").modal();
        
    },
     

  }


     
  
};
</script>