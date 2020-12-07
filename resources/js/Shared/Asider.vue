<template>
  <div>
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="/" class="brand-link">
            <img src="http://kobranzas.co/storage/img/AdminLTELogo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">kobranzas</span>

          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img :src="$page.user.profile_photo_url" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info"> 
                <!-- PARA TRAER PAGINA:  -->
                <jet-responsive-nav-link :href="route('profile.show')" class="d-block" :active="route().current('profile.show')"> 
                     Johann Ramirez 
                </jet-responsive-nav-link> 
              </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                  <inertia-link class="nav-link" :href="route('dashboard')"> 
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard 
                    </p>
                  </inertia-link>       
                </li>
                
                <li class="nav-item has-treeview ">
                  <inertia-link class="nav-link" :href="route('user.index')"> 
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Usuarios 
                      <span class="badge badge-info right">6</span>
                    </p>
                  </inertia-link>
                </li>      

                <li class="nav-item has-treeview">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon far fa-building"></i>
                    <p>
                      Conjuntos  
                    </p>
                  </inertia-link>
                </li>

                <li class="nav-item has-treeview">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                      Trabajadores 
                    </p>
                  </inertia-link>
                </li>
                
                <li class="nav-item has-treeview">
                    <inertia-link class="nav-link" :href="route('llamadas')"> 
                      <i class="nav-icon fas fa-phone"></i>
                      <p>
                        Llamadas 
                      </p>
                    </inertia-link> 
                </li> 
                <li class="nav-item">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon fas fa-hands-helping"></i>
                    <p>
                      Acuerdos
                    </p>
                  </inertia-link> 
                </li>

                <li class="nav-item has-treeview">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                      Reportes 
                    </p>
                  </inertia-link> 
                </li>
                
                <li class="nav-item">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                      Calendar
                      <span class="badge badge-info right">2</span>
                    </p>
                  </inertia-link>
                </li>
                
                

                <li class="nav-item has-treeview">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Pages 
                    </p>
                  </inertia-link> 
                </li>

                <li class="nav-item">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                      Mailbox
                      <span class="right badge badge-danger">New</span>
                      
                    </p>
                  </inertia-link> 
                </li>
                
                <li class="nav-item">
                  <inertia-link class="nav-link" :href="route('construir')"> 
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Widgets
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
import JetNavLink from "@/Jetstream/NavLink";

export default {
  components: {
    JetResponsiveNavLink,
    JetNavLink,
  },
};
</script>
