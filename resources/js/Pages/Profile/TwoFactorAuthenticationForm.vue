<template>
  <jet-action-section>
    <template #title> Autenticación en dos pasos </template>

    <template #description>
      Agrega seguridad adicional en tu cuenta usando la autenticación en dos
      pasos.
    </template>

    <template #content>
      <h3 class="text-lg font-medium text-gray-900" v-if="twoFactorEnabled">
        Has activado la autenticación en dos pasos.
      </h3>

      <h3 class="text-lg font-medium text-gray-900" v-else>
        No has actualizado la autenticación en dos pasos.
      </h3>

      <div class="mt-3 max-w-xl text-sm text-gray-600">
        <p>
          Cuándo actives la autenticación en dos pasos, se le solicitará un
          token aleatorio seguro durante la autenticación. Puedes recuperar este
          token de la aplicación
          <a
            href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=es_CO&gl=US"
            target="_blank"
            ><b>Google Authenticator (Android)</b></a
          >
          o
          <a
            href="https://apps.apple.com/es/app/google-authenticator/id388497605"
            target="_blank"
            ><b>Google Authenticator (iOS)</b></a
          >
          de tu teléfono.
        </p>
      </div>

      <div v-if="twoFactorEnabled">
        <div v-if="qrCode">
          <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
              La autenticación de dos factores ahora está habilitada. Escanee el
              siguiente código QR utilizando la aplicación de autenticación
              <a
                href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=es_CO&gl=US"
                target="_blank"
                ><b>Google Authenticator (Android)</b></a
              >
              o
              <a
                href="https://apps.apple.com/es/app/google-authenticator/id388497605"
                target="_blank"
                ><b>Google Authenticator (iOS)</b></a
              >
              de tu teléfono.
            </p>
          </div>

          <div
            class="mt-4 dark:p-4 dark:w-56 dark:bg-white"
            v-html="qrCode"
          ></div>
        </div>

        <div v-if="recoveryCodes.length > 0">
          <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
              Guarde estos códigos de recuperación en un lugar seguro. Se pueden
              usar para recuperar el acceso a tu cuenta si pierdes tu
              dispositivo con la aplicación de autenticación en dos pasos.
            </p>
          </div>

          <div
            class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg"
          >
            <div v-for="code in recoveryCodes" :key="code">
              {{ code }}
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <div v-if="!twoFactorEnabled">
          <jet-confirms-password @confirmed="enableTwoFactorAuthentication">
            <jet-button
            class="btn"  style="background-color: rgb(109, 223, 182);color: white;"
              type="button"
              :class="{ 'opacity-25': enabling }"
              :disabled="enabling"
            >
              Activar
            </jet-button>
          </jet-confirms-password>
        </div>

        <div v-else>
          <jet-confirms-password @confirmed="regenerateRecoveryCodes">
            <jet-secondary-button class="mr-3" v-if="recoveryCodes.length > 0">
              Generar códigos nuevos
            </jet-secondary-button>
          </jet-confirms-password>

          <jet-confirms-password @confirmed="showRecoveryCodes">
            <jet-secondary-button class="mr-3" v-if="recoveryCodes.length == 0">
              Ver códigos de recuperación
            </jet-secondary-button>
          </jet-confirms-password>

          <jet-confirms-password @confirmed="disableTwoFactorAuthentication">
            <jet-danger-button
            class="btn"  style="background-color:rgb(255 63 63 / 83%);color: white;"
              :class="{ 'opacity-25': disabling }"
              :disabled="disabling"
            >
              Desactivar
            </jet-danger-button>
          </jet-confirms-password>
        </div>
      </div>
    </template>
  </jet-action-section>
</template> 

<script>
import JetActionSection from "@/Jetstream/ActionSection";
import JetButton from "@/Jetstream/Button";
import JetConfirmsPassword from "@/Jetstream/ConfirmsPassword";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  components: {
    JetActionSection,
    JetButton,
    JetConfirmsPassword,
    JetDangerButton,
    JetSecondaryButton,
  },

  data() {
    return {
      enabling: false,
      disabling: false,

      qrCode: null,
      recoveryCodes: [],
    };
  },

  methods: {
    enableTwoFactorAuthentication() {
      this.enabling = true;

      this.$inertia
        .post(
          "/user/two-factor-authentication",
          {},
          {
            preserveScroll: true,
          }
        )
        .then(() => {
          return Promise.all([this.showQrCode(), this.showRecoveryCodes()]);
        })
        .then(() => {
          this.enabling = false;
        });
    },

    showQrCode() {
      return axios.get("/user/two-factor-qr-code").then((response) => {
        this.qrCode = response.data.svg;
      });
    },

    showRecoveryCodes() {
      return axios.get("/user/two-factor-recovery-codes").then((response) => {
        this.recoveryCodes = response.data;
      });
    },

    regenerateRecoveryCodes() {
      axios.post("/user/two-factor-recovery-codes").then((response) => {
        this.showRecoveryCodes();
      });
    },

    disableTwoFactorAuthentication() {
      this.disabling = true;

      this.$inertia
        .delete("/user/two-factor-authentication", {
          preserveScroll: true,
        })
        .then(() => {
          this.disabling = false;
        });
    },
  },

  computed: {
    twoFactorEnabled() {
      return !this.enabling && this.$page.user.two_factor_enabled;
    },
  },
};
</script>
