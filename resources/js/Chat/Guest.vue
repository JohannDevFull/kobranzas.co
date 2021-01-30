<template>
  <div class="chat-widget-wrapper">
    <span class="notification" v-if="notification"
      ><i class="fas fa-exclamation" :class="notify"></i
      ><i class="fas fa-bell" :class="bell"></i
    ></span>

    <audio id="myAudio">
      <source src="/storage/img/pop.ogg" type="audio/ogg" />
      <source src="/storage/img/pop.mp3" type="audio/mpeg" />
      Your browser does not support the audio element.
    </audio>
    <div class="chat-widget-container" v-if="!enabled" @click="toggle()">
      <div class="chat-widget-text">
        <p class="heading">CHAT EN VIVO</p>

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
                    <p class="text-wait">
                      Espera por favor, nuestros empleados estan un poco
                      ocupados por el momento, pero no te preocupes te atenderán
                      en breve. <br /><strong>No abandones la pagina</strong>
                    </p>
                    <Loader />
                  </div>
                  <div v-if="!isLoading">
                    <p class="text-wel">
                      Hola, por favor ingresa tu nombre para que puedas ingresar
                      al chat de soporte y puedas solucionar tus dudas e
                      inconvenientes
                    </p>
                    <br />
                    <input
                      type="text"   
                      class="form-control"
                      placeholder="Tu nombre aquí"
                      @keyup.enter="joinChat()"  
                      v-model="guest"
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
    };
  },
  created() {},
  mounted() {
    this.enterChat();
    this.deleteTempUser();
    this.messageIncomming();
  },
  methods: {
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
      if (this.guest.trim() == "") {
        this.guest = "";
        return;
      } else {
        var regex = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;

        if (!regex.test(this.guest)) {
          this.errors = {
            errors: [["Por favor ingresa un nombre válido."]],
          };
          this.guest = "";
          return false;
        } else {
          this.isLoading = !this.isLoading;
        }
        axios
          .post("/chat/joinChat", {
            nombre: this.guest,
          })
          .then((response) => {
            this.isLoading = !this.isLoading;
            this.userinfo = response.data;

            this.isLoading = !this.isLoading;
            this.errors = [];
            this.messageIncomming();
            this.enterChat();
            this.deleteTempUser();
          })
          .catch((error) => {
            this.errors = error.response.data;
          });
      }
    },
    chatRoom(id, nombre) {
      axios
        .post("messages/guestMessages", {
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
        axios.post("messages/sendMessageToGuest", {
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
