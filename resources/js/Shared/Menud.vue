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
        <li class="nav-item" style="padding: 5px">
          <h6>
            {{ $inertia.page.rol }}
          </h6>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li
          v-if="
            $inertia.page.rol == 'Admin' || $inertia.page.rol == 'AdminConjunto'
          "
          class="nav-item dropdown pointer"
          :class="{ show: expand }"
          @click="toggle(), markAsread()"
        >
          <a class="nav-link">
            <i class="fas fa-bell"></i>
            <span class="badge badge-danger navbar-badge">{{
              notifications.length
            }}</span>
          </a>
          <div
            style="max-height: 300px; overflow: auto"
            class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
            :class="{ show: expand }"
          >
            <div v-if="notifications.length == 0">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      No tienes Notificaciones recientes
                    </h3>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
            </div>
            <div v-for="item in notifications" v-else>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img
                    :src="parse(item.from).profile_photo_url"
                    alt="User Avatar"
                    class="img-size-50 mr-3 img-circle"
                  />
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      {{ parse(item.from).name }}
                    </h3>
                    <p class="text-sm">
                      {{ item.action }} un {{ item.notificable }} con
                      {{ parse(item.info).name }}
                    </p>
                    <p class="text-sm text-muted">
                      <i class="far fa-clock mr-1"></i>hace
                      {{ timeElapsep(item.created_at) }}
                    </p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div>
            <form class="nav-link" @submit.prevent="logout">
              <button
                type="submit"
                style="background: transparent; border: none !important"
              >
                <i class="fas fa-power-off" style="color: red"></i>
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
  data() {
    return {
      expand: false,
      notifications: [],
    };
  },
  created() {
    this.getNotifications();
  },
  components: {},
  mounted() {
    this.agreement();
    this.agreementAdmin();
  },
  methods: {
    timeElapsep(date) {
      var dateConverted = new Date(date);
      var CurrentDate = moment();
      var a = CurrentDate.diff(dateConverted, "seconds");
      if (a > 60) {
        let b = a / 60;
        if (b > 60) {
          let c = b / 60;
          if (c > 24) {
            let d = c / 24;
            return Math.round(d) + " día(s)";
          }
          return Math.round(c) + " hora(s)";
        }
        return Math.round(b) + " minuto(s)";
      }
      return a + " segundo(s)";
    },
    parse(parse) {
      parse = JSON.parse(parse);
      return parse;
    },
    toggle() {
      this.expand = !this.expand;
    },
    getNotifications() {
      if (
        this.$inertia.page.rol == "Admin" ||
        this.$inertia.page.rol == "AdminConjunto"
      ) {
        axios.post("/notifications").then((response) => {
          this.notifications = response.data;
        });
      }
    },
    markAsread() {
      if (this.expand == false) {
        this.notifications = [];
      }
      if (this.notifications.length) {
        axios.post("/markSeen");
      }
    },
    agreement() {
      if (this.$inertia.page.rol == "Admin") {
        setTimeout(() => {
          Echo.channel("newAgreement").listen("AgreementEvent", (e) => {
            this.getNotifications();
          });
        }, 300);
      }
    },
    agreementAdmin() {
      if (this.$inertia.page.rol == "AdminConjunto") {
        setTimeout(() => {
          Echo.channel("newAgreement." + this.$page.user.id).listen(
            "AgreementEventAdmin",
            (e) => {
              this.getNotifications();
            }
          );
        }, 300);
      }
    },
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      axios.post(route("logout").url()).then((response) => {
        window.location = "/";
      });
    },
  },
};
</script> 
<style lang="css">
.pointer {
  cursor: pointer;
}
</style>