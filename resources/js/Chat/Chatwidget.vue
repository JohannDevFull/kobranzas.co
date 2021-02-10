<template>
  <div class="chat-widget-wrapper">
    <span class="notification" v-if="notification"
      ><i class="fas fa-exclamation" :class="notify"></i
      ><i class="fas fa-bell" :class="bell"></i
    ></span>
    <!-- <pop /> -->
    <div
      class="chat-widget-avatar"
      v-if="!enabled && available == false"
      @click="toggle()"
    >
      <img src="/storage/img/chat.png" style="width: 72px" alt="" />
    </div>
    <div
      class="chat-widget-container"
      :class="pageVar"
      v-if="!enabled && available == false"
      @click="toggle()"
    >
      <div class="chat-widget-text">
        <p class="heading-c">CHAT NO DISPONIBLE</p>
        <p>
          No Disponible <span class="forbidden" style="font-size: 21px">•</span>
        </p>
      </div>
    </div>
    <div
      class="chat-widget-avatar"
      v-if="!enabled && available"
      @click="toggle()"
    >
      <img src="/storage/img/chat.png" style="width: 72px" alt="" />
    </div>
    <div
      class="chat-widget-container"
      :class="pageVar"
      v-if="!enabled && available"
      @click="toggle()"
    >
      <div class="chat-widget-text">
        <p class="heading-c">CHAT DE CONTACTO</p>

        <p>¿Cómo te podemos ayudar?</p>
      </div>
    </div>

    <div class="chat-box-container" v-if="enabled && info && chatMode">
      <div class="chat-box-nav"></div>
      <div class="chat-box">
        <div class="chat-box-header">
          {{ contactName }}
          <span class="chat-box-toggle" @click="toggle()"
            ><i class="fas fa-minus"></i
          ></span>
          <span class="chat-box-toggle" @click="toggleChatRoom()"
            ><i class="fas fa-user-friends"></i
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
                    message.from == userinfo.id
                      ? 'user'
                      : (message.from = !userinfo.id),
                }"
              >
                <div class="cm-msg-text">{{ message.text }}</div>
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
    <div class="chat-box-container" v-if="enabled && !chatMode && !available">
      <div class="chat-box-nav"></div>
      <div class="chat-box2" style="height: 74vh">
        <div class="chat-box-body" style="height: 74vh; max-height: 100%">
          <div class="chat-box-overlay"></div>
          <div class="" style="overflow: auto">
            <button class="btn-times" @click="toggle()">
              <span class="chat-box-toggle"><i class="fas fa-minus"></i></span>
            </button>
            <div id="cm-msg-1" class="chat-msg self">
              <div class="form-group text-center">
                <div class="chat-box-welcome__welcome-text">
                  <div>
                    <br />
                    <p
                      class="text-wel soomuchstyle"
                      :class="fontcustom"
                      v-if="status == 0"
                    >
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
                    <p
                      class="text-wel soomuchstyle"
                      :class="fontcustom"
                      v-else
                    >
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
    <div
      class="chat-box-container"
      v-if="enabled && seeContacts && !chatMode && available"
    >
      <div class="chat-box-nav"></div>

      <div class="chat-box">
        <div class="chat-box-header">
          Contactos de soporte
          <span class="chat-box-toggle" @click="toggle()"
            ><i class="fas fa-minus"></i
          ></span>
        </div>
        <div class="chat-box-body">
          <div class="chat-box-overlay"></div>
          <div class="chat-logs">
            <div id="cm-msg-1" class="chat-msg self" style="margin-right: 0">
              <div
                class="cm-msg-text"
                style="
                  width: 100%;
                  max-width: 100%;
                  margin-right: 0;
                  margin-bottom: 6px;
                  cursor: pointer;
                  border-radius: 8px;
                "
                v-for="user in contacts"
                :key="user.id"
                @click="
                  chatRoom(user.id, user.name),
                    (chatMode = true),
                    updateUnreadCount(user.id, true)
                "
              >
                <p style="margin: 0">
                  <img
                    style="width: 2.1rem"
                    class="img-circle elevation-2"
                    :src="user.profile_photo_url"
                    alt=""
                  />

                  {{ user.name }}
                  <br />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ user.roles[0].name }}
                  <span class="unread" v-if="user.unread != 0">{{
                    user.unread
                  }}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Loader from "@/Kobranzas/Loading";
import pop from "@/Chat/pop";
export default {
  name: "chatwidget",
  components: {
    Loader,
    pop,
  },
  data() {
    return {
      isLoading: false,
      userinfo: "",
      enabled: false,
      guest: "",
      seeContacts: false,
      contacts: [],
      unread: "",
      chatMode: false,
      messages: [],
      message: "",
      contactId: "",
      contactName: "",
      displaySound: false,
      notification: false,
      available: false,
      status: false,
    };
  },
  created() {
    this.now();
    this.statusChat();
    this.getUser();
  },
  mounted() {
    this.now();
    this.chat();
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
    chat() {
      setTimeout(() => {
        Echo.channel(`chat.${this.userinfo.id}`).listen("NewMessage", (e) => {
          this.contacts = this.contacts.sort(function (a, b) {
            return b.unread - a.unread;
          });
          if (this.contactId == "") {
            if (e.message.to == this.userinfo.id) {
              if (!this.enabled) {
                this.notification = true;
              }
              this.updateUnreadCount(e.message.from, false);
              this.noty();
            } else {
              return;
            }
          } else if (e.message.to == this.userinfo.id) {
            if (this.contactId != e.message.from) {
              this.updateUnreadCount(e.message.from, false);
              this.noty();
              if (!this.enabled) {
                this.notification = true;
              }
            } else {
              this.messages.push({
                from: e.message.from,
                to: e.message.to,
                text: e.message.text,
              });

              if (
                (this.enabled && !this.seeContacts) ||
                (this.enabled && this.chatMode)
              ) {
                this.scroll();
              }

              this.noty();
              if (!this.enabled) {
                this.notification = true;
              }
            }
          }
        });
      }, 100);
    },
    getUser() {
      axios.post("/chat/getUser").then((response) => {
        this.userinfo = response.data;
        this.chat();
        if (this.userinfo.roles[0].name) {
          axios.post("/chat/getContacts").then((res) => {
            this.contacts = res.data;
            this.seeContacts = true;
            this.contacts = this.contacts.sort(function (a, b) {
              return b.unread - a.unread;
            });
          });
        }
      });
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
      axios
        .post("/chat/joinChat", {
          name: this.guest,
        })
        .then((response) => {
          this.isLoading = !this.isLoading;
        });
    },
    chatRoom(id, nombre) {
      this.messages = [];
      axios
        .post("/messages/getMessages", {
          from: this.userinfo.id,
          to: id,
        })
        .then((resMessages) => {
          this.chatMode = true;
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
      } else {
        let msg = this.message;
        this.messages.push({
          from: this.userinfo.id,
          to: this.contactId,
          text: msg,
        });
        this.message = "";
        this.scroll();
        axios.post("/messages/sendMessage", {
          id: this.userinfo.id,
          contact_id: this.contactId,
          text: msg,
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
    },
    now() {
      setInterval(this.getTime, 1000);
    },
  },

  computed: {
    info() {
      return this.userinfo;
    },
    pageVar() {
      return {
        customLineH: this.$page,
        customLineH2: !this.$page,
      };
    },
    fontcustom() {
      return {
        customfsize: this.$page,
        customfsize2: !this.$page,
      };
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
.customLineH {
  line-height: 1.2rem;
}
.customLineH2 {
  line-height: 2rem;
}
.customfsize {
  font-size: 1.07rem!important;
}
.customfsize2 {
  font-size: 1.77rem!important;
}
</style>