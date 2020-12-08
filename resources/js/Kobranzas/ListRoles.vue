<template> 
  <div class="col-sm-4" style="border:black 2px solid">
    <table class="w-full whitespace-no-wrap">
      
      <tr class="text-left font-bold">
        <div class="custom-control custom-checkbox" style="padding: 10px;margin-right: 10px">
          <div class="text-center">
              <a href="" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalRol">
                Nuevo rol
              </a>
          </div>
        </div> 
      </tr>

      <div class="list-group" style="padding: 10px;">
        <tr v-for="row in roles"   class="hover:bg-gray-100 focus-within:bg-gray-100">
          
          <td class="border-t"> 
            <inertia-link class="list-group-item list-group-item-action" style="width: 180px" 
             :href="route('rol.permisos')">
               {{ row.name }} 
            </inertia-link>
          </td>

          <td width="130"  style="width: 150px" >
              <button @click="edit(row)" class="btn btn-sm btn-primary">Edit</button>
              <button @click="deleteRow(row)" class="btn btn-sm btn-danger">Del</button>
          </td>
        </tr>
      </div>  
                  
                   
    </table>
  </div>

</template>

<script> 

  export default { 
    props: ['rolles'],
    components: { 
    }, 
  }
</script>