<template>
  <div>
    <Admin v-if="$inertia.page.rol=='Admin'" />
    <AdminConjunto v-if="$inertia.page.rol=='AdminConjunto'" />
    <Empleado v-if="$inertia.page.rol=='Empleado'" />
    <Cliente v-if="$inertia.page.rol=='Cliente'"/>
    <div class="row">
      <div class="col-12"></div>
      <!-- /.col -->
    </div>
  </div>
</template>

<script>
import Admin from "@/Pages/Dashboard/admin";
import AdminConjunto from "@/Pages/Dashboard/adminConjunto";
import Empleado from "@/Pages/Dashboard/empleado";
import Cliente from "@/Pages/Dashboard/cliente";

export default {
  components: {
    Admin,
    AdminConjunto,
    Empleado,
    Cliente,
  },
};
</script>
