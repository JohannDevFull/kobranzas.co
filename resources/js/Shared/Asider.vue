<template>
  <div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <img
          src="/storage/img/AdminLTELogo.png"
          alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3"
          style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">LSA Abogados</span>
        <a data-widget="pushmenu" role="button" class="btn-togg float-right"><i class="fas fa-bars"></i></a>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img
              :src="$page.user.profile_photo_url"
              class="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div class="info">
            <!-- PARA TRAER PAGINA:  -->
            <jet-responsive-nav-link
              :href="route('profile.show')"
              class="d-block"
              :active="route().current('profile.show')"
            >
              <!-- nombre de usuario -->
              {{ $page.user.name }}
            </jet-responsive-nav-link>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <inertia-link class="nav-link" :href="route('dashboard')" data-widget="pushmenu">
                
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </inertia-link>
            </li>

            <li
              class="nav-item has-treeview"
              v-if="$inertia.page.rol == 'Admin'"
            >
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios

                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none">
                <li class="nav-item">
                  <inertia-link class="nav-link" :href="route('user.index')" data-widget="pushmenu">
                    <i class="nav-icon fas fa-address-book text-success"></i>
                    <p>Ver Usuarios</p>
                  </inertia-link>
                </li>
                <li class="nav-item">
                  <inertia-link class="nav-link" :href="route('user.create')" data-widget="pushmenu">
                    <i class="nav-icon fas fa-user-plus text-success"></i>
                    <p>Crear Usuarios</p>
                  </inertia-link>
                </li>
              </ul>
            </li>

            <li class="nav-item" v-if="$inertia.page.rol == 'Admin'">
              <inertia-link class="nav-link" :href="route('conjuntos')" data-widget="pushmenu">
                <i class="nav-icon far fa-building"></i>
                <p>Conjuntos</p>
              </inertia-link>
            </li>
            <li
              class="nav-item has-treeview"
              v-if="
                $inertia.page.rol == 'Admin' || $inertia.page.rol == 'Empleado'
              "
            >
              <inertia-link class="nav-link" :href="route('llamadas')" data-widget="pushmenu">
                <i class="nav-icon fas fa-phone"></i>
                <p>Llamadas</p>
              </inertia-link>
            </li>
            <li
              class="nav-item"
              v-if="
                $inertia.page.rol == 'Admin' || $inertia.page.rol == 'Empleado'
              "
            >
              <inertia-link class="nav-link" :href="route('construir')" data-widget="pushmenu">
                <i class="nav-icon fas fa-hands-helping"></i>
                <p>Acuerdos</p>
              </inertia-link>
            </li>

            <li
              class="nav-item has-treeview"
              v-if="$inertia.page.rol == 'Admin'"
            >
              <inertia-link class="nav-link" :href="route('construir')" data-widget="pushmenu">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>Reportes</p>
              </inertia-link>
            </li>
            <li
              class="nav-item has-treeview"
              v-if="
                $inertia.page.rol == 'Admin' ||
                $inertia.page.rol == 'Empleado' ||
                $inertia.page.rol == 'AdminConjunto'
              "
            >
              <inertia-link class="nav-link" :href="route('chat.index')" data-widget="pushmenu">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>Chat de Soporte</p>
              </inertia-link>
            </li>

            <li class="nav-item">
              <inertia-link class="nav-link" :href="route('construir')" data-widget="pushmenu">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Calendar
                  <span class="badge badge-info right">2</span>
                </p>
              </inertia-link>
            </li>

            <li class="nav-item">
              <inertia-link class="nav-link" :href="route('construir')" data-widget="pushmenu">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Mailbox
                  <span class="right badge badge-danger">New</span>
                </p>
              </inertia-link>
            </li>
            <li class="nav-item">
              <inertia-link class="nav-link" :href="route('historial.index')" data-widget="pushmenu">
                <i class="nav-icon fas fa-history"></i>
                <p>
                  Historial
                </p>
              </inertia-link>
            </li>

            <li class="nav-item has-treeview">
              <inertia-link
              data-widget="pushmenu"
                class="nav-link"
                :href="route('permisos')"
                v-if="$inertia.page.rol == 'Admin'"
              >
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  Permisos
                  <span class="right badge badge-danger">New</span>
                </p>
              </inertia-link>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>

<script>
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";
export default {
  components: {
    JetResponsiveNavLink,
  },
  data() {
    return {
      showingNavigationDropdown: false,
    };
  },
};
</script>
<style lang="css">
.btn-togg{
  display: none!important;
}

  @media(max-width:991px){
    .btn-togg{
      display:block!important;
    }
  }
</style>