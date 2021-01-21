<template>
    <div>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                  <i class="fas fa-bars"></i>
                </a>
              </li>
              <li class="nav-item" style="padding: 5px;">
                <h6 >
                  {{$inertia.page.rol}}
                </h6>
                  
              </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              
              <!-- Notifications Dropdown Menu -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header">15 Notifications</span>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
              </li> -->
              <li class="nav-item"> 
                <div>
                  <form class="nav-link" @submit.prevent="logout">
                      <button  type="submit" style="background: transparent;border: none !important;"> 
                        <i class="fas fa-power-off" style="color: red;"></i>
                      </button>
                  </form> 
                </div>
              </li>
            </ul>
      </nav>
      <!-- /.navbar -->
    </div>
</template>

<script> 

    export default {
        components: { 
        }, 
         
        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                axios.post(route('logout').url()).then(response => {
                    window.location = '/';
                })
            },
        }
    }
</script> 