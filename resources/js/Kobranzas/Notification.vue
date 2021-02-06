<template>
  <div>
    <pop />
  </div>
</template>

<script>
import pop from "@/Chat/pop";

export default {
  props: ["userauth", "rol"],
  components: {
    pop,
  },
  data() {
    return {};
  },

  mounted() {
    this.guestSend();
    this.notiNewMessage();
    this.requestIncoming();
  },
  methods: {
    requestIncoming() {
      if (this.rol != "Cliente") {
        setTimeout(() => {
          Echo.channel("joinGuest").listen("GuestJoinChat", (e) => {
            this.noty();
            push.create("Nueva Solicitud en el Chat de Contacto", {
              body: e.message.name + " <br/> " + e.message.email,
              icon: e.message.photo,
              data: e.message,
              timeout: 6000,

              onClick: function () {
                window.focus();
                this.close();
              },
            });
            push.Permission.DENIED;
          });
        }, 100);
      }
    },
    guestSend() {
      setTimeout(() => {
        Echo.channel(`guestSend.${this.userauth.id}`).listen(
          "GuestSendMessage",
          (e) => {
            this.noty();
            push.create(e.guest[0].name, {
              body: e.message.text,
              icon: e.guest[0].photo,
              timeout: 6000,

              onClick: function () {
                window.focus();
                this.close();
              },
            });
            push.Permission.DENIED;
          }
        );
        Echo.leave();
      }, 100);
    },
    notiNewMessage() {
      setTimeout(() => {
        Echo.channel(`chat.${this.userauth.id}`).listen("NewMessage", (e) => {
          this.noty();
          push.create(e.message.from_contact.name, {
            body: e.message.text,
            icon: e.message.from_contact.profile_photo_url,
            timeout: 6000,

            onClick: function () {
              window.focus();
              this.close();
            },
          });
          push.Permission.DENIED;
        });
        Echo.leave();
      }, 100);
    },
    noty() {
      var x = document.getElementById("myAudio");
      x.play();
    },
  },
};
</script>