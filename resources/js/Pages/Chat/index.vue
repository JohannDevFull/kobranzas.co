<template>
  <app-layout>
    <section class="">
      <div class="">
        <div class="fill">
          <div class="">
            <div>
              <div>
                <pop />

                <div class="inbox_msg">
                  <div
                    class="inbox_people"
                    id="contacts"
                    :style="{ height: window.height - 120 + 'px' }"
                  >
                    <div class="headind_srch">
                      <div class="recent_heading">
                        <h4>Chat de Soporte</h4>
                      </div>
                      <div class="srch_bar"></div>
                      <div
                        class="btn-bars"
                        id="user-friends"
                        @click="toggleCollapseBtn()"
                      >
                        <i class="fas fa-bars"></i>
                      </div>
                    </div>
                    <div
                      class="inbox_chat"
                      :style="{ height: window.height - 170 + 'px' }"
                    >
                      <span v-if="guests != 0" class="spantitle"
                        >Visitantes</span
                      >
                      <hr style="margin: 0" />
                      <div id="guests" v-for="guest in guests">
                        <div
                          v-if="
                            guest.user_id == $page.user.id ||
                            guest.user_id == null
                          "
                          class="chat_list"
                          @click="
                            chatRoomGuest(
                              guest.idTemp,
                              guest.name,
                              guest.photo,
                              guest.user_id
                            ),
                              (isGuest = true),
                              (guest.unread = 0),
                              isLoad(),
                              toggleCollapseBtn()
                          "
                        >
                          <div class="chat_people">
                            <div class="chat_img">
                              <img
                                class="img-circle pro"
                                :src="guest.photo"
                                alt="sunil"
                              />
                            </div>
                            <div class="chat_ib">
                              <h5>
                                {{ guest.name }}
                                <span v-if="guest.status == 0" class="chat_date"
                                  >Pendiente</span
                                >
                                <span
                                  v-else-if="guest.user_id == $page.user.id"
                                  class="chat_date"
                                  >Atendido por ti</span
                                >
                                <span v-else class="chat_date"
                                  >En Proceso...</span
                                >
                              </h5>
                              <p>Usuario Visitante</p>
                              <span v-if="guest.unread != 0" class="unread">{{
                                guest.unread
                              }}</span>
                            </div>
                          </div>  
                        </div>
                        <!--                          -->
                        <button
                          v-if="
                            guest.user_id != $page.user.id &&
                            guest.user_id != null
                          "
                          style="width: 100%!important" 
                          class="btn disabled btn-tosel"
                        >
                          <div class="chat_list">
                            <div class="chat_people">
                              <div class="chat_img">
                                <img
                                  class="img-circle pro"
                                  :src="guest.photo"
                                  alt="sunil"
                                />
                              </div>
                              <div class="chat_ib">
                                <h5>
                                  {{ guest.name }}

                                  <span
                                    v-if="guest.status == 0"
                                    class="chat_date"
                                    >Pendiente</span
                                  >
                                  <span
                                    v-else-if="guest.user_id == $page.user.id"
                                    class="chat_date"
                                    >Atendido por ti</span
                                  >
                                  <span v-else class="chat_date"
                                    >En Proceso...</span
                                  >
                                </h5>
                                <p>Usuario Visitante</p>
                                <span v-if="guest.unread != 0" class="unread">{{
                                  guest.unread
                                }}</span>
                              </div>
                            </div>
                          </div>
                        </button>
                        <!--  -->
                      </div>
                      <span class="spantitle">Usuarios</span>
                      <hr style="margin: 0" />
                      <div id="users" v-for="contact in contacts">
                        <div
                          class="chat_list"
                          @click="
                            chatRoom(
                              contact.id,
                              contact.name,
                              contact.profile_photo_url
                            ),
                              updateUnreadCount(contact.id, true),
                              (isGuest = false),
                              toggleCollapseBtn()
                          "
                        >
                          <div class="chat_people">
                            <div class="chat_img">
                              <img
                                class="img-circle pro"
                                :src="contact.profile_photo_url"
                                alt="sunil"
                              />
                            </div>
                            <div class="chat_ib">
                              <h5>
                                {{ contact.name }}

                                <span
                                  v-if="contact.unread == 0"
                                  class="chat_date"
                                ></span>
                                <span
                                  v-else
                                  class="unread"
                                  style="position: relative; top: 22px"
                                  >{{ contact.unread }}</span
                                >
                              </h5>
                              <p>
                                {{ contact.roles[0].name }}
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mesgs" id="inboxChat">
                    <div class="chat-header">
                      <div v-if="contactId && !isLoading">
                        <div style="display: inline-block">
                          <img
                            style="margin-bottom: 4px"
                            class="img-circle pro"
                            :src="user_photo"
                            alt="sunil"
                          />
                        </div>
                        &nbsp; {{ contactName }}
                        <div
                          class="btn-bars"
                          id="user-friends"
                          @click="toggleCollapseBtn()"
                        >
                          <i class="fas fa-user-friends"></i>
                        </div>
                        <button
                          v-if="isGuest && !isLoading && window.width > 785"
                          class="btn btn-danger btn-sm btn-end"
                          @click="endChat(contactId)"
                        >
                          Terminar Chat
                        </button>
                        <button
                          style="margin-right: 48px"
                          v-if="isGuest && !isLoading && window.width <= 785"
                          class="btn btn-danger btn-sm btn-end"
                          @click="endChat(contactId)"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                    <div
                      class="msg_history"
                      id="messages"
                      :style="{ height: window.height - 195 + 'px' }"
                    >
                      <loading2 v-if="isLoading" />
                      <div
                        class="text-noMessages"
                        v-if="messages.length == 0 && !isLoading"
                      >
                        No hay mensajes para mostrar
                        <div
                          class="btn-bars"
                          id="user-friends"
                          @click="toggleCollapseBtn()"
                        >
                          <i class="fas fa-user-friends"></i>
                        </div>
                      </div>

                      <div
                        class=""
                        :class="
                          msg.from == $page.user.id
                            ? 'outgoing_msg'
                            : 'incoming_msg'
                        "
                        v-for="msg in messages"
                      >
                        <div
                          class="incoming_msg_img"
                          v-if="msg.from == contactId"
                        >
                          <img
                            class="img-circle pro"
                            :src="user_photo"
                            alt="sunil"
                          />
                        </div>
                        <div
                          :class="
                            msg.from == $page.user.id
                              ? 'sent_msg'
                              : 'received_msg'
                          "
                        >
                          <div class="received_withd_msg">
                            <p>{{ msg.text }}</p>

                            <span
                              class="time_date"
                              v-if="msg.from == $page.user.id"
                            ></span>
                            <span class="time_date" style="float: left" v-else>
                              {{ contactName }}</span
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="type_msg">
                      <div class="input_msg_write">
                        <input
                          v-if="!isGuest && contactId"
                          type="text"
                          class="form-control write_msg"
                          placeholder="Escribe un Mesaje.."
                          v-model="message"
                      
                          @keyup.enter="sendMessage()"
                        />
                        <button
                          v-if="!isGuest && contactId"
                          type="submit"
                          class="chat-submit send-btn"
                          id="chat-submit"
                          @click="sendMessage()"
                        >
                          <i class="far fa-paper-plane"></i>
                        </button>

                        <input
                          v-if="isGuest && !isLoading"
                          type="text"
                          class="form-control write_msg"
                          placeholder="Escribe un Mesaje de soporte"
                          v-model="messageGuest"
                          @keyup.enter="sendMessageToGuest()"
                        />
                        <button
                          v-if="isGuest && !isLoading"
                          type="submit"
                          class="chat-submit send-btn"
                          id="chat-submit"
                          @click="sendMessageToGuest()"
                        >
                          <i class="far fa-paper-plane"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";
import pop from "@/Chat/pop";
import Loading2 from "@/Kobranzas/Loading2";
import Loading from "../../Kobranzas/Loading.vue";
// Pusher.logToConsole = true;
export default {
  components: {
    AppLayout,
    JetNavLink,
    pop,
    Loading2,
    Loading,
  },
  data() {
    return {
      isGuest: false,
      guests: [],
      contacts: [],
      messages: [],
      message: "",
      messageGuest: "",
      contactName: "",
      contactId: "",
      user_photo: "",
      isLoading: false,
      idChat: "",
      messageIncoming: false,
      window: {
        height: 0 + "px",
        width: 0,
      },
    };
  },

  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
    this.getGuests();
    this.getContacts();
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  mounted() {
    setTimeout(() => {
      Echo.channel(`chat.${this.$page.user.id}`).listen("NewMessage", (e) => {
        if (this.contactId == "") {
          if (e.message.to == this.$page.user.id) {
            this.updateUnreadCount(e.message.from, false);
            this.noty();
          } else {
            return;
          }
        } else if (e.message.to == this.$page.user.id) {
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
            this.scroll();
        this.updateUnreadCount(e.message.from, false);
            this.noty();
            if (!this.enabled) {
              this.notification = true;
            }
          }
        }
        this.chatRoom(this.contactId, this.contactName, this.user_photo);
        
      });
    }, 100);
    setTimeout(() => {
      Echo.channel("joinGuest").listen("GuestJoinChat", (e) => {
        this.getGuests();
        this.noty();
      });
    }, 100);

    setTimeout(() => {
      Echo.channel(`guestSend.${this.$page.user.id}`).listen(
        "GuestSendMessage",
        (e) => {
          
          if (e.message.to == this.$page.user.id && this.isGuest) {
            if (this.contactId != e.message.from) {
              this.noty();
              this.updateUnreadGuest(e.message.from, false);
              this.messageIncoming = true;
            }
            else{
            this.noty();
            this.updateUnreadGuest(e.message.from, false);
            this.messageIncoming = true;

            this.chatRoomGuest(
              e.guest[0].idTemp,
              e.guest[0].name,
              e.guest[0].photo,
              e.guest[0].user_id
            );

          }
          this.noty();
          //this.updateGuestStatus(e.guest[0].idTemp, false);
          this.messageIncoming = true;
        }}
      );
    }, 100);
    setTimeout(() => {
      Echo.channel("status").listen("ChatWithGuest", (e) => {
        this.updateGuestStatus(e.guest[0].idTemp, false);
        this.updateUserId(e.guest[0].user_id, e.guest[0].idTemp);
      });
    }, 100);
    setTimeout(() => {
      Echo.channel("deleted").listen("DeleteTempUser", (e) => {
        if (this.contactId == e.deleted) {
          this.messages = [];
        }
        this.getGuests();

        this.isGuest = false;
      });
    }, 100);
  },
  methods: {
    handleResize() {
      this.window.height = window.innerHeight;
      this.window.width = window.innerWidth;
    },
    isLoad() {
      if (this.idChat == this.contactId) {
        return;
      } else {
        this.messages = [];
        this.isLoading = true;
      }
    },
    scroll() {
      setTimeout(() => {
        var container = this.$el.querySelector("#messages");
        container.scrollTop = 10000000;
      }, 10);
    },
    getGuests() {
      axios
        .post("/chat/getRequests", {
          from: this.$page.user.from,
        })
        .then((res) => {
          this.guests = res.data;
        });
    },
    getContacts() {
      axios.post("/chat/getContacts").then((res) => {
        this.contacts = res.data;
        this.contacts = this.contacts.sort(function (a, b) {
          return b.unread - a.unread;
        });
      });
    },
    chatRoomGuest(id, nombre, photo, user_id) {
      if (this.idChat == id && this.contactId != "" && !this.messageIncoming) {
        return;
      } else {
        this.idChat = id;
        axios
          .post("messages/getGuestMessages", {
            from: this.$page.user.id,
            to: id,
          })
          .then((resMessages) => {
            this.chatMode = true;
            this.messages = resMessages.data;
            this.contactName = nombre;
            this.user_photo = photo;
            this.contactId = id;
            this.scroll();
            this.isLoading = false;
            this.messageIncoming = false;
          })
          .catch((err) => {
            console.log("error");
            console.log(err);
            this.chatMode = true;
            this.messages = [];
          });
      }
    },
    chatRoom(idcontact, nombre, photo) {
      if (this.idChat == idcontact && this.contactId != "" && !this.isGuest) {
        return;
      } else {
        this.idChat = idcontact;
        axios
          .post("messages/getMessages", {
            from: this.$page.user.id,
            to: this.idChat,
          })
          .then((resMessages) => {
            this.chatMode = true;
            this.messages = resMessages.data;
            this.contactName = nombre;
            this.user_photo = photo;
            this.contactId = idcontact;
            //this.isLoading=false;
            this.scroll();
          })
          .catch((err) => {
            console.log("error");
            console.log(err);
            this.chatMode = true;
            this.messages = [];
          });
      }
    },
    sendMessage() {
      if (this.message.trim() == "") {
        this.message = "";
        return;
      } else {
        let msg = this.message;
        this.messages.push({
          from: this.$page.user.id,
          to: this.contactId,
          text: msg,
          name: this.$page.user.name,
        });
        this.message = "";
        this.scroll();
        axios.post("messages/sendMessage", {
          id: this.$page.user.id,
          contact_id: this.contactId,
          text: msg,
        });
      }
    },
    endChat(idTemp) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "¿Estás Seguro que quieres terminar el chat?",
          text:
            "Una vez terminado el chat NO podras ver los mensajes de nuevo!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí, Terminar!",
          cancelButtonText: "No, Cancelar!",
          reverseButtons: true,
          showLoaderOnConfirm: true,
        })
        .then((result) => {
          if (result.isConfirmed) {
            this.isLoading = true;
            this.messages = [];
            this.contactId = "";
            axios.delete("chat/endChat/" + idTemp).then((response) => {
              if (window.window.innerWidth > 785) {
              } else {
                $("#user-friends").removeClass("hide");
                $("#inboxChat").removeClass("vis");
                $("#contacts").removeClass("hide");
              }
              this.isLoading = false;
              swalWithBootstrapButtons.fire(
                "Eliminado!",
                `El chat ha sido terminado.`,
                "success"
              );
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelado",
              "El chat NO se ha terminado ten más cuidado.",
              "error"
            );
          }
        });
    },
    toggleCollapseBtn() {
      if (window.window.innerWidth > 785) {
        $("#user-friends").removeClass("hide");
        $("#inboxChat").addClass("vis");
        $("#contacts").removeClass("hide");
      } else {
        $("#user-friends").toggleClass("hide");
        $("#inboxChat").toggleClass("vis");
        $("#contacts").toggleClass("hide");
      }
    },
    noty() {
      var x = document.getElementById("myAudio");
      x.play();
    },
    sendMessageToGuest() {
      if (this.messageGuest.trim == "") {
        this.messageGuest = "";
        return;
      } else {
        let msg = this.messageGuest;
        this.messages.push({
          from: this.$page.user.id,
          to: this.contactId,
          text: msg,
        });
        this.messageGuest = "";
        this.scroll();
        axios.post("messages/sendMessageToGuest", {
          id: this.$page.user.id,
          contact_id: this.contactId,
          text: msg,
        });
      }
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
    },updateUnreadGuest(guest, reset) {
      this.guests = this.guests.map((gue) => {
        if (gue.idTemp != guest) {
          return gue;
        }

        if (reset) gue.unread = 0;
        else gue.unread += 1;

        return gue;
      });
    },
    updateUserId(user, guest) {
      this.guests = this.guests.map((us) => {
        if (us.idTemp != guest) {
          return us;
        }
        us.user_id = user;
        return us;
      });
    },
    updateGuestStatus(guest, reset) {
      this.guests = this.guests.map((single) => {
        if (single.idTemp != guest) {
          return single;
        }

        if (reset) single.status = 0;
        else single.status += 1;

        return single;
      });
    },
  },
  computed: {},
};
</script>
<style lang="css">
.chat-header {
  width: 100%;
  background: #2d7d46d6;
  margin: 0px 0px 0px 0px;
  position: relative;
  box-shadow: 0px 2px 6px #9c8e8e;
  color: white;
}
.text-noMessages {
  margin-top: 15px;
  text-align: center;
  font-family: "dosis", sans-serif;
  font-weight: 500;
  font-size: 1.2rem;
}
img {
  max-width: 40px;
}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;

  width: 40%;
  border-right: 1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
}
.top_spac {
  margin: 20px 0 0;
}
.recent_heading {
  float: left;
  width: 100%;
}
.headind_srch {
  background: #4e9163;
  text-align: center;
}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.btn-tosel {
  padding: 0;
  text-align: inherit;
}

.recent_heading h4 {
  top: 10px;
  color: white;
  font-size: 21px;
  margin: auto;
  position: relative;
}
.send-btn {
  position: relative;
  float: right;
  top: -15px;
}
.srch_bar input {
  border: 1px solid #cdcdcd;
  border-width: 0 0 1px 0;
  width: 80%;
  padding: 2px 0 4px 6px;
  background: none;
}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon {
  margin: 0 0 0 -27px;
}

.chat_ib h5 {
  font-size: 15px;
  color: #464646;
  margin: 0 0 8px 0;
}
.chat_ib h5 span {
  font-size: 13px;
  float: right;
}
.chat_ib p {
  font-size: 14px;
  color: #989898;
  margin: auto;
}
.chat_img {
  float: left;
  width: 10%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 20px;
  width: 88%;
}

.chat_people {
  overflow: hidden;
  clear: both;
}
.inbox_chat::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #f5f5f5;
}

.inbox_chat::-webkit-scrollbar {
  width: 5px;
  background-color: #f5f5f5;
}

.inbox_chat::-webkit-scrollbar-thumb {
  background-color: #001f3f;
}

.msg_history::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #f5f5f5;
}

.msg_history::-webkit-scrollbar {
  width: 5px;
  background-color: #f5f5f5;
}

.msg_history::-webkit-scrollbar-thumb {
  background-color: #001f3f;
}

.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat {
  height: 481px;
  overflow-y: auto;
}

.active_chat {
  background: #ebebeb;
}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
}
.received_withd_msg p {
  background: #00000063;
  padding: 10px 15px 10px 15px;
  color: white;
  max-width: 60%;
  float: left;
  margin: 0;
  position: relative;

  border-radius: 30px;

  word-wrap: break-word;
  white-space: normal;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 0;
  width: 100%;
}
.received_withd_msg {
  width: 99%;
}

.mesgs {
  float: left;

  width: 60%;
}

.sent_msg p {
  float: right;

  background: #09904bb8;
  color: white;
}
.outgoing_msg {
  overflow: hidden;
  margin: 8px 0 8px;
}
.sent_msg {
  float: right;
  width: 100%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 30px;
  width: 85%;
  top: -17px;
  position: absolute;
  margin: 13px 0px -1px 3px;
  height: 14px;
  border-bottom: 1px solid #a9a1a1;
}
.input_msg_write input:focus {
  outline: none;
}
.type_msg {
  position: relative;
  bottom: -8px;
}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging {
  padding: 0 0 50px 0;
}
.msg_history {
  overflow-y: auto;
  overflow-x: hidden;
}
/* .msg_history::after {
  content: "";
  background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=);
  opacity: 0.1;
  top: 0%;
  left: 40%;
  bottom: 0;
  right: 0;
 
  position: absolute;
  z-index: 0;
} */
.fill {
  position: relative;
  top: -22px;
}
.spantitle {
  margin-left: 10px;
  font-weight: 600;
}
.pro {
  margin-left: 5px;
  margin-top: 4px;
  box-shadow: 0px 0px 3px;
}
.btn-end {
  float: right;
  margin: 8px 9px 0px 8px;
  position: relative;
}
.btn-bars {
  color: black;
  cursor: pointer;
  display: none;
  position: absolute;
  top: 16px;
  padding-right: 15px;
  right: 0;
}
.vis {
  display: block !important;
  visibility: visible;
}

@media (max-width: 785px) {
  .btn-bars {
    display: block !important;
  }
  .inbox_people {
    width: 100%;
  }
  .mesgs {
    display: none;
    width: 100%;
  }
  .hide {
    display: none !important;
    visibility: hidden;
  }
}
@media (max-width: 360px) {
  .chat_ib {
    padding: 0 0 0 33px;
  }
}
</style>      