<template>
  <div>
      <pop/>
  </div>
</template>

<script>
import pop from "@/Chat/pop";

export default {
    props:['userauth','rol'],
    components:{
        pop
    },
  data() {
    return {};
  },
  
   mounted(){
       console.log(this.userauth);
       console.log(this.rol);

      this.notiNewMessage();
  },
  methods: {
    notiNewMessage() {
        setTimeout(() => {
          Echo.channel(`chat.${this.userauth.id}`).listen(
            "NewMessage",
            (e) => {
              
                push.create(e.message.from_contact.name, {
                  body: e.message.text,
                  icon: e.message.from_contact.profile_photo_url,
                  timeout: 4000,

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
  },
};
</script>