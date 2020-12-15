<template>
  <app-layout>
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Roles y permisos</h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a href="" class="btn btn-block btn-primary"  data-toggle="modal" data-target="#modalAsignarRol">
                      Asignar permisos a Usuario
                    </a>
                  </li>
                </ul>
            </div>
        </div> 
        <div class="card-body">   
              
          <div class="row">

            <!-- <listr/> -->
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
                       :href="route('rol.permisos',row.id)">
                         {{ row.name }} 
                      </inertia-link>
                    </td>

                    <td width="130"  style="width: 150px" >
                        <button @click="saludar()" class="btn btn-sm btn-primary">Edit</button>
                        <button @click="deleteRow(row)" class="btn btn-sm btn-danger">Del</button>
                    </td>
                  </tr>
                </div>  
                      
              </table>
            </div>

            <div class="col-sm-8" style="border:black 2px solid" >

                <div class="col-sm-6"  style="padding: 10px;">
                  <div class="text-center">
                    <a href="" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalSubscriptionForm">
                        Nuevo Permiso
                    </a>
                  </div>
                </div>

                <!-- radio -->
                <div class="form-group">

                  <DIV id=”menu_wrapper”>
                    <ul>
                      <li>
                        <tr v-for="rot in permisos"  class="hover:bg-gray-100 focus-within:bg-gray-100">
                           
                           
                          <td v-if="rot.check==true">
                                 <input type="checkbox" v-model="rot.check" >
                          </td>
                          <td v-else>
                                 <input type="checkbox" v-model="rot.check" >
                          </td>
                            
                            
                          <td class="">
                            <label class="form-check-label"> 
                               {{ rot.id }} {{ rot.name }} {{ rot.check }}
                            </label>
                          </td>
                        </tr>
                      </li>

                    </ul>         
                              
                  </DIV>
      
                </div>
 
            </div>

          </div>

        </div>          
      </div>
    </div>


    <modal-rol/>
    <modal-permiso/>
    <modal-asignar-rol v-bind:select="datos" />

  </app-layout>
</template>

<script> 
  import AppLayout from '@/Layouts/AppLayout' 
  // import Listr from '@/Kobranzas/ListRoles' 
  import ModalRol from '@/Kobranzas/ModalRol' 
  import ModalPermiso from '@/Kobranzas/ModalPermiso'
  import ModalAsignarRol from '@/Kobranzas/ModalAsignarRol'

  export default {
    props:['roles','permisos'],

    data(){
      return{
        datos: this.roles, 
      }
    },

    components: {
        AppLayout, 
        //Listr, 
        ModalRol, 
        ModalPermiso, 
        ModalAsignarRol, 
    },
    methods:{
      
    }
  }
</script>
