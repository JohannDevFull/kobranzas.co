<template>
  <div>
     
 
    <!-- Modal -->
    <div class="modal fade" id="CreateAccountModal" tabindex="-1"  role="dialog" aria-labelledby="ClientModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ClientModalLabel">Agregar cuenta</h5>
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
                            <label>Capital Deuda</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-sort-amount-up-alt"></i></span> 
                              </div>
                              <input type="text" class="form-control" v-model="capital" >
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

                    <ul v-for="error in errors.errors">
                      <li class="required"> {{ error[0] }} </li>
                    </ul>

                  </div>
          </div> 
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
                                 
            <button type="button" style="margin-top:-4px" class="btn btn-success" @click="guardarCuenta()"  >
                            Crear Cuenta  
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
      capital: "",
      capital_decimal: "",
      intereses: "",
      intereses_decimal: "",
      id_cliente:this.cliente_id,
    };

  },
  watch:{
    capital: function() { 
      this.capital_decimal = this.capital;
      
      var res=this.formatear(this.capital);

      this.capital=res;
      return this.capital;
    },
    intereses: function() {
      this.intereses_decimal = this.intereses;

      var res=this.formatear(this.intereses);

      this.intereses=res;
      return this.intereses;
    },
  },
  methods: {

    guardarCuenta(){ 

      var capital =this.sinFormatNumber(this.capital_decimal);
      var intereses =this.sinFormatNumber(this.intereses_decimal);

      var url = "/account/store";
      axios
      .post(url, { 
        
        capital_deuda: capital,
        intereses: intereses, 
        cliente_id: this.id_cliente, 
      })
      .then((response)=>{ 
        Swal.fire({
            icon: "success",
            title: "Cuenta Creada",
            text:"Exito al registrar Cuenta.",
            showConfirmButton: false,
            timer: 1500,
          });
        $("#CreateAccountModal").modal('hide');
        Inertia.reload({ only: ['cuenta'] },);
        Inertia.visit('/llamadas/agreement/'+this.id_cliente,{ only: ['cuenta'] });
        
      })
      .catch((error) => {
        this.errors = error.response.data;
        console.log("Este es el error"+error);
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