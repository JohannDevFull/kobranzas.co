<template>
  <div>
     
 
    <!-- Modal -->
    <div class="modal fade" id="movementModal" tabindex="-1"  role="dialog" aria-labelledby="ClientModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ClientModalLabel">Agregar Movimiento</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         
          <div class="modal-body"> 
                  <div style="padding: 5px; margin: auto">

                    <div class="col-sm-12">
                      <div class="form-group ">
                            <label>Tipo movimiento</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>

                              <select class="form-control" v-model="seles">
                                <option value="" disabled>Seleccione Estado</option>
                                <option v-for="optionss in tipo_movimiento" v-bind:value="optionss.id_type_movement">
                                  {{ optionss.name_movement }}
                                </option>
                              </select>


                            </div>
                      </div>
                    </div>

                    <div class="col-sm-12" v-if="seles===1">
                      <div class="form-group " >
                            <label></label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>

                              <select class="form-control" v-model="selestado" >
                                <option value="" disabled>Seleccione Estado cargue</option>
                                <option v-for="options in descripcion_movimiento_cargue" v-bind:value="options.description">
                                  {{ options.description }}
                                </option>
                              </select>

                            </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-12" v-else>
                       
                      <div class="form-group " >
                            <label>Descripcion movimiento</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>

                              <select class="form-control" v-model="selestado" >
                                <option value="" disabled>Seleccione Estado abono</option>
                                <option v-for="options in descripcion_movimiento_abono" v-bind:value="options.description">
                                  {{ options.description }}
                                </option>
                              </select>


                            </div>
                      </div>
                      
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group ">
                            <label>Intereses</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                              </div>
                              <input type="text" class="form-control"  v-model="intereses" >
                            </div>
                      </div>
                    </div>

                    <div>
                      
                      <div class="form-group ">
                            <label>Fecha</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                              </div>
                              <input
                                class="form-control"
                                type="datetime-local"
                                v-model="dateReminder"
                              />
                            </div>
                      </div>
                    </div>

                    <ul v-for="error in errors.errors">
                      <li class="required"> {{ error[0] }} </li>
                    </ul>

                  </div>
          </div> 
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
                                 
            <button type="button" style="margin-top:-4px" class="btn btn-success" @click="guardarMovimiento()"  >
                           Guardar movimiento  
            </button>        
          </div>
        </div>
      </div>

    </div>
    <!--  -->
  </div>
</template>
<script>
  import { Inertia } from '@inertiajs/inertia'
export default {
  props: ['cliente_id'],
  data() {

    return {
      files: null,
      import_file: "",
      errors: {}, 
      capital_decimal: "",
      intereses: "",
      intereses_decimal: "",
      id_cliente:this.cliente_id,
      selestado:"", 
      seles:"", 
      tipo_movimiento:[],
      descripcion_movimiento_cargue:[],
      descripcion_movimiento_abono:[],
    };

  },
  created(){ 
        this.buscarTipoMovimientos() 
        this.buscarDescripcionMovimientosCargue() 
        this.buscarDescripcionMovimientosAbono() 
  },
  computed:{
    
  },
  watch:{
    intereses: function() {
      this.intereses_decimal = this.intereses;

      var res=this.formatear(this.intereses);

      this.intereses=res;
      return this.intereses;
    },
    seles:function(val){
      this.selestado="";
      return val;
    }
  },
  methods: {

    guardarMovimiento(){ 
 
      var intereses =this.sinFormatNumber(this.intereses_decimal);

      var url = "/movement/store";
      axios
      .post(url, { 

        tipo_movimiento:this.seles, 
        descripcion_movimiento:this.selestado, 
        valor_moviminto:intereses, 
        fecha: this.dateReminder,
        cliente_id: this.id_cliente, 
      })
      .then((response)=>{ 
        
        Swal.fire({
            icon: "success",
            title: "Movimiento Creado",
            text:"Exito al registrar movimiento.",
            showConfirmButton: false,
            timer: 1500,
          });

        $("#movementModal").modal('hide');


        Inertia.reload({ only: ['cuenta','movimientos'] },);
        Inertia.visit('/llamadas/agreement/'+this.id_cliente,{ preserveScroll: true },{ only: ['cuenta','movimientos'] });
        
      })
      .catch((error) => {
        this.errors = error.response.data;
        console.log("Este es el error movimiento"+error);
      });
    },

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
    buscarDescripcionMovimientosCargue(){
      axios.get('/buscar/descripcion_movimiento_cargue',{
            
      })
      .then( resp => { 
          this.descripcion_movimiento_cargue=resp.data  
      })
      .catch( error => {
          console.log( error.response )
      });
    },
    buscarDescripcionMovimientosAbono(){
      axios.get('/buscar/descripcion_movimiento_abono',{
            
      })
      .then( resp => { 
          this.descripcion_movimiento_abono=resp.data  
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
   
};
</script>