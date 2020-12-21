

require('./bootstrap');

window.Vue = require('vue');


import ChatWidget from '@/Chat/ChatWidget';
import ChatGuest from '@/Chat/Guest';

const main = new Vue({
    el: '#main',
    components:{
        'chatwidget': ChatWidget,
        'chatguest': ChatGuest
    }
 
    
});


