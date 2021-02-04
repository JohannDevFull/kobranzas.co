<template>
  <div  >
    
      <!-- Modal -->
        <div class="modal fade " id="showMovementModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles Movimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            
              <div class="modal-body" v-if="movimiento===0">

              </div>

              <div class="modal-body" v-else>
                <div class="row p-2" id="collapseExample">   
                  <div class="row" style="background-color: green;">

                    <div class="col-sm-6">
                      <div class="form-group">
                            <label>Tipo de movimiento</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <select class="form-control" v-model="sel_tipo" disabled>
                                <option value="" disabled>Seleccione Estado</option>
                                <option v-for="optionss in tipo_movimiento" v-bind:value="optionss.id_type_movement">
                                  {{ optionss.name_movement }}
                                </option>
                              </select>
                            </div>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group ">
                            <label>Descripcion</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                              </div>
                              <input type="text" class="form-control"  v-model="descripcion"  disabled>
                            </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group ">
                            <label>Valor movimiento</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <input type="number" class="form-control" min="1" max="24"  v-model="valor" disabled="">
                            </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group ">
                            <label>Fecha movimiento</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>

                              <input type="text" class="form-control" min="1" max="24"  v-model="fecha" disabled>
                              
                            </div>
                      </div>
                    </div>

                    
                    <div class="col-sm-8" style="margin:auto; ">
                      <div class="form-group">
                        <label>Mensaje movimiento</label>
                        <textarea v-model="descripcion" class="form-control" rows="0" placeholder="Escribir una breve descripcion..." disabled="">
                        </textarea>
                      </div>
                    </div> 


                  </div>

                  
                </div>

              </div>

              <div class="modal-footer" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
              </div>

            </div>
          </div>

        </div>

    
    
  </div>
</template>

<script>  
  
  export default { 
      props: ['movimiento','id','boleano'],
      
      components:{

      },
      created(){  
        this.buscarTipoMovimientos() 
      },
      data() {
          return {  
            estados:[],  
            sel:this.id,  
            acuerdo_bol:0,

            total_deuda:0,
            tipo_movimiento:[],


            administracion:0,
            selestado:"",  
            selestado:"",  
            mensaje:"",
          }
      },
      computed: {
         
        valor:function(){
          var res=this.formatear(String('1000000'));
          return res;
        },
        sel_tipo:function(){
          var id_tipo=this.movimiento[this.id].type_movement_id;
          return id_tipo;
        },
        descripcion:function(){
          var id_tipo=this.movimiento[this.id].description_movement;
          return id_tipo;
        },
        valor:function(){
          var id_tipo=this.movimiento[this.id].valor_movement;
          return id_tipo;
        },
        fecha:function(){
          var id_tipo=this.movimiento[this.id].created_at;
          return id_tipo;
        }
        
        
      },
      methods: {
        buscarTipoMovimientos(){
          axios.get('/buscar/tipo_movimiento',{
                
          })
          .then( resp => { 
              this.tipo_movimiento=resp.data  
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
