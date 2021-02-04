<template>
  <div class="chat-widget-wrapper">
    <span class="notification" v-if="notification"
      ><i class="fas fa-exclamation" :class="notify"></i
      ><i class="fas fa-bell" :class="bell"></i
    ></span>

    <!-- <audio id="myAudio">
      <source src="/storage/img/pop.ogg" type="audio/ogg" />
      <source src="/storage/img/pop.mp3" type="audio/mpeg" />
      Your browser does not support the audio element.
    </audio> -->
    <div
      class="chat-widget-container"
      style="line-height: 2rem; "
      v-if="!enabled && available == false"
      @click="toggle()"
    >
      <div class="chat-widget-text">
        <p class="heading">CHAT NO DISPONIBLE</p>
        <p>No Disponible <span class="forbidden">•</span></p>
      </div>
      <div class="chat-widget-avatar">
        <img src="/storage/img/chat.svg" style="width: 72px" alt="" />
      </div>
    </div>
    <div
      class="chat-widget-container"
      style="line-height: 2rem; "
      v-if="!enabled && available"
      @click="toggle()"
    >
      <div class="chat-widget-text">
        <p class="heading">CHAT DE CONTACTO</p>

        <p>¿Cómo te podemos ayudar?</p>
      </div>
      <div class="chat-widget-avatar">
        <img src="/storage/img/chat.svg" style="width: 72px" alt="" />
      </div>
    </div>
    <div class="chat-box-container" v-if="enabled && !chatMode">
      <div class="chat-box-nav"></div>
      <div class="chat-box2" style="height: 74vh">
        <div class="chat-box-body" style="height: 74vh; max-height: 100%">
          <div class="chat-box-overlay"></div>
          <div class="" style="overflow: auto">
            <button class="btn-times" @click="toggle()">
              <span class="chat-box-toggle"><i class="fas fa-times"></i></span>
            </button>
            <div id="cm-msg-1" class="chat-msg self">
              <div class="form-group text-center">
                <div class="chat-box-welcome__welcome-text">
                  <div v-if="isLoading">
                    <p class="text-wait soomuchstyle">
                      Espera por favor, nuestros empleados estan un poco
                      ocupados por el momento, pero no te preocupes te atenderán
                      en breve. <br /><strong>No abandones la pagina</strong>
                    </p>
                    <Loader />
                  </div>
                  <div v-if="!isLoading && available">
                    <p class="text-wel soomuchstyle">
                      Hola, por favor ingresa tu nombre para que puedas ingresar
                      al chat de soporte y puedas solucionar tus dudas e
                      inconvenientes
                    </p>
                    <br />
                    <input
                      type="text"
                      class="form-control form-inpt"
                      placeholder="ingresa tu nombre"
                      @keyup.enter="joinChat()"
                      v-model="guest"
                      maxlength="35"
                    />
                    <input
                      type="text"
                      class="form-control form-inpt"
                      placeholder="ingresa tu correo"
                      @keyup.enter="joinChat()"
                      v-model="email"
                      maxlength="35"
                    />
                    <input
                      type="text"
                      class="form-control form-inpt"
                      placeholder="ingresa tu número identificación"
                      @keyup.enter="joinChat()"
                      v-model="number"
                      maxlength="35"
                    />

                    <button
                      class="form-control btn btn-outline-dark center"
                      @click="joinChat()"
                    >
                      Entrar
                    </button>
                    <ul v-for="error in errors.errors">
                      <li class="required">{{ error[0] }}</li>
                    </ul>
                  </div>
                  <div v-if="!isLoading && !available">
                    <br />
                    <p class="text-wel soomuchstyle" v-if="status == 0">
                      <span class="required">
                        El chat está inactivo temporalmente
                      </span>
                      <br />
                      El Administrador ha deshabilitado el chat temporalmente
                      <br />
                      Intenta comunicarte con nosotros a través del formulario
                      de contacto o
                      <br />
                      intenta más tarde.
                    </p>
                    <p class="text-wel soomuchstyle" v-else>
                      El chat está inactivo actualmente
                      <br />
                      Los horarios de atención son:
                      <br />
                      <span class="required">8:00 am a 6:00 pm</span>
                      <br />
                      Intente más tarde.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="chat-box-container" v-if="enabled && chatMode">
      <div class="chat-box-nav"></div>
      <div class="chat-box">
        <div class="chat-box-header">
          Chat con {{ contactName }}
          <span class="chat-box-toggle" @click="toggle()"
            ><i class="fas fa-times"></i
          ></span>
        </div>
        <div class="chat-box-body" id="messagesconotainer">
          <div class="chat-logs" id="messages">
            <div v-for="message in messages" :key="message.id">
              <div
                class="chat-msg"
                style=""
                :class="{
                  self:
                    message.from == userinfo.idTemp
                      ? 'user'
                      : (message.from = !userinfo.idTemp),
                }"
              >
                <div class="cm-msg-text">
                  {{ message.text }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="chat-input">
          <input
            type="text"
            id="chat-input"
            placeholder="Envía un mensaje..."
            v-model="message"
            @keyup.enter="sendMessage()"
          />
          <button
            type="submit"
            class="chat-submit"
            id="chat-submit"
            @click="sendMessage()"
          >
            <i class="far fa-paper-plane"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Loader from "@/Kobranzas/Loading";
export default {
  name: "chatwidget",
  components: {
    Loader,
  },
  data() {
    return {
      isLoading: false,
      userinfo: "",
      enabled: false,
      guest: "",
      email: "",
      number: "",
      contacts: [],
      unread: "",
      chatMode: false,
      messages: [],
      message: "",
      contactId: "",
      contactName: "",
      displaySound: false,
      notification: false,
      errors: [],
      available: false,
      status: false,
    };
  },
  created() {
    this.now();
    this.statusChat();
  },
  mounted() {
    this.now();
    this.enterChat();
    this.deleteTempUser();
    this.messageIncomming();
    setTimeout(() => {
      Echo.channel("toggleChat").listen("ChatToggleEvent", (e) => {
        this.statusChat();
        this.now();
      });
    }, 100);
  },
  methods: {
    statusChat() {
      axios.post("/chat/chatStatus").then((response) => {
        if (this.contactId) {
          this.status = 1;
        } else {
          this.status = response.data.chatActivated;
        }
      });
    },
    enterChat() {
      if (this.userinfo.idTemp) {
        setTimeout(() => {
          Echo.channel(`status.${this.userinfo.idTemp}`).listen(
            "ChangeGuestStatus",
            (e) => {
              if (this.userinfo.idTemp == e.guest[0].idTemp) {
                this.chatMode = true;
                this.chatRoom(e.admin.id, e.admin.name);
              }
            }
          );
        }, 100);
      }
    },
    deleteTempUser() {
      if (this.userinfo.idTemp) {
        setTimeout(() => {
          Echo.channel(`deleted.${this.userinfo.idTemp}`).listen(
            "EndChat",
            (e) => {
              if (this.userinfo.idTemp == e.deleted) {
                this.enabled = false;
                this.chatMode = false;
                this.isLoading = false;
                this.userinfo = "";
                this.contactId = "";
                this.statusChat();
                this.now();
              }
            }
          );
        }, 100);
      }
    },
    messageIncomming() {
      if (this.userinfo.idTemp) {
        setTimeout(() => {
          Echo.channel(`tempChat.${this.userinfo.idTemp}`).listen(
            "NewTempMessage",
            (e) => {
              if (this.userinfo.idTemp == e.message.to) {
                if (this.enabled) {
                  this.noty();
                  this.chatRoom(this.contactId, this.contactName);
                } else if (!this.enabled) {
                  if (!this.info) {
                    return;
                  } else {
                    this.chatRoom(this.contactId, this.contactName);
                    this.noty();
                    this.notification = true;
                  }
                }
              } else {
                return;
              }
            }
          );
        }, 100);
      }
    },
    toggle() {
      this.enabled = !this.enabled;
      this.notification = false;
      if (this.chatMode && this.enabled) {
        this.scroll();
      }
    },
    toggleChatRoom() {
      this.enabled = true;
      this.chatMode = !this.chatMode;
      this.seeContacts = true;
      this.contactId = "";
    },
    updateUnreadCount(contact, reset) {
      this.contacts = this.contacts.map((single) => {
        if (single.id != contact) {
          return single;
        }

        if (reset) single.unread = 0;
        else single.unread += 1;

        return single;
      });
    },
    joinChat() {
      // if (this.guest.trim() == "") {
      //   this.guest = "";
      //   return;
      // } else {
      //   var regex = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;

      //   if (!regex.test(this.guest)) {
      //     this.errors = {
      //       errors: [["Por favor ingresa un nombre válido."]],
      //     };
      //     this.guest = "";
      //     return false;
      //   } else {
      //
      //   }
      this.isLoading = !this.isLoading;
      axios
        .post("/chat/joinChat", {
          nombre: this.guest,
          correo: this.email,
          documento: this.number,
        })
        .then((response) => {
          this.userinfo = response.data;
          this.errors = [];
          this.messageIncomming();
          this.enterChat();
          this.deleteTempUser();
        })
        .catch((error) => {
          this.errors = error.response.data;
          this.isLoading = false;
        });
      // }
    },
    chatRoom(id, nombre) {
      axios
        .post("/messages/guestMessages", {
          from: this.userinfo.idTemp,
          to: id,
        })
        .then((resMessages) => {
          this.messages = resMessages.data;

          this.contactName = nombre;
          this.contactId = id;
          this.scroll();
        })
        .catch((err) => {
          console.log("error");
          console.log(err);
          this.chatMode = true;
          this.messages = [];
        });
    },
    sendMessage() {
      if (this.message.trim() == "") {
        this.message = "";
        return;
      } else {
        let msg = this.message;
        this.messages.push({
          from: this.userinfo.idTemp,
          to: this.contactId,
          text: msg,
        });
        this.message = "";
        this.scroll();
        axios.post("/messages/sendMessageToGuest", {
          id: this.userinfo.idTemp,
          contact_id: this.contactId,
          text: msg,
          userinfo: this.info,
        });
      }
    },
    scroll() {
      setTimeout(() => {
        var container = this.$el.querySelector("#messages");
        container.scrollTop = 10000000;
      }, 10);
    },
    noty() {
      var x = document.getElementById("myAudio");
      x.play();
    },
    getTime() {
      var hoy = new Date();
      var hora = hoy.getHours();
      if (hoy.getHours() < 8 || hoy.getHours() >= 18) {
        if (this.contactId) {
          this.available = true;
        } else {
          this.available = false;
        }
      } else {
        if (this.status == 0) {
          this.available = false;
        } else {
          this.available = true;
        }
      }
      // console.log(hoy.getMinutes() + "" + "" + this.available);
    },
    now() {
      setInterval(this.getTime, 1000);
    },
  },

  computed: {
    info() {
      return this.userinfo;
    },
    bell() {
      return {
        bell: this.notification,
        "": !this.notification,
      };
    },
    notify() {
      return {
        notify: this.notification,
        "": !this.notification,
      };
    },
  },
};
</script> 
<style lang="css">
.form-inpt {
  margin-bottom: 12px;
  padding: 0px 14px !important;
  border: 3px solid rgb(13, 66, 97);
  height: 4rem;
}
.soomuchstyle {
  font-weight: 600;
  font-size: 1.6rem;
}
</style>