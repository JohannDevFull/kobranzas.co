<template>
  <div  >
    
      <!-- Modal -->
        <div class="modal fade " id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles Acuerdo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            
              <div class="modal-body" v-if="boleano===-1">

              </div>

              <div class="modal-body" v-else>
                 <div class="row p-2" id="collapseExample">   
                  <div class="row" style="background-color: green;">

                    <div class="col-sm-4">
                      <div class="form-group ">
                            <label>Total deuda</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <input type="text" class="form-control"   v-model="deuda_decimal"  disabled="">
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group ">
                            <label>Abono</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <input type="text" class="form-control"   v-model="abono_decimal"  disabled="">
                            </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-4">
                      <div class="form-group ">
                            <label>Subtotal deuda</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                              </div>
                              <input type="text" class="form-control"  v-model="total"  disabled>
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group ">
                            <label>Cuotas</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <input type="number" class="form-control" min="1" max="24"  v-model="cuotas" disabled="">
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group ">
                            <label>Valor subcuota</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              <input type="text" class="form-control"  v-model="sub_cuota" disabled>
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group ">
                            <label>Valor administracion</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              <input type="text" class="form-control" v-model="administracion" disabled>
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group ">
                            <label>Valor total cuota</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              <input type="text" class="form-control" v-model="valor_cuota" disabled>
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group " >
                        <label>Estado</label>
                        <span class="required">*</span>
                        <select class="form-control" v-model="selestado">
                          <option value="" disabled>Seleccione Estado</option>
                          <option v-for="option in estados" v-bind:value="option.id_state">
                            {{ option.description }}
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-8" style="margin:auto; ">
                      <div class="form-group">
                        <label>Observaciones del acuerdo </label>
                        <textarea v-model="observaciones" class="form-control" rows="0" placeholder="Escribir una breve descripcion..." disabled="">
                        </textarea>
                      </div>
                    </div> 


                  </div>
                  <div class="row">
                    
                  </div>
                </div>

              </div>

              <div class="modal-footer" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
              </div>

            </div>
          </div>

        </div>

    
    
  </div>
</template>

<script>  
  
  export default { 
      props: ['acuerdo','ides','id','boleano','cuentaTotal'],
      
      components:{

      },
      created(){  
        this.buscarEstados()
      },
      
      data() {
          return {  
            estados:[],  
            sel:this.id,  
            acuerdo_bol:0,

            total_deuda:0,

            administracion:0,
            selestado:"",  
            cuenta_total:"",
          }
      },
      computed: {
        observaciones:function(){

            return this.acuerdo[this.id].observations; 
        },
        cuotas:function(){
            return this.acuerdo[this.id].quotas;

        },
        deuda:function(){
          return this.acuerdo[this.id].current_debt;
        },
        deuda_decimal:function(){
          var res=this.formatear(String(this.acuerdo[this.id].current_debt));
          return res;
        },
        abono: function(){
            return this.acuerdo[this.id].credit;
        },
        total: function(){
          var num = this.deuda-this.abono;
          var total=this.formatear(String(num.toFixed(2)));
          this.total_deuda=num;
          return total; 
        },
        abono_decimal: function(){
          var res=this.formatear(String(this.abono));
          return res;
        },
        sub_cuota: function(){
          if (this.cuotas===0){
            return this.subcuota=0;
          }else{
            var num= this.total_deuda/this.cuotas;
            var n=num.toFixed(2); 
            this.subcuota=n;
            return this.formatear(String(n));
          } 
        },
        valor_cuota: function(){
          if (this.subcuota===0){
            return this.valorCuota=0;
          }else{
            var num= parseFloat(this.subcuota)+parseFloat(this.admin);
            var n=num.toFixed(2); 
            return this.formatear(String(n));
          }

        },
      },
      methods: {
        buscarEstados(){
          axios.get('/buscar/estados',{
                
          })
          .then( resp => { 
              this.estados=resp.data  
          })
          .catch( error => {
              console.log( error.response )
          });
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
        

      },
  }
</script>
