

require('./bootstrap');

window.Vue = require('vue');


import ChatWidget from '@/Chat/ChatWidget';
import ChatGuest from '@/Chat/Guest';
import Notification from '@/Kobranzas/Notification';

const main = new Vue({
    el: '#main',
    components:{
        'chatwidget': ChatWidget,
        'chatguest': ChatGuest,
        'notification': Notification
    }
 
    
});


