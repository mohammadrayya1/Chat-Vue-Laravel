require('./bootstrap');

import { createApp  } from "vue";

import Messenger from "../components/messages/Messenger.vue"
import ChatList from "../components/messages/ChatList.vue";
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');



const chatApp = createApp({
    data() {
        return {
            conversations: [],
            conversation: null,
            userId: userId,
            csrf_token:csrf_token,
            laravelEco:null,
            messages:[],
            users: [],
            chatChannel: null,

        }
    },
    mounted() {

        this.laravelEco = new Echo({
            broadcaster: 'pusher',
            key: '2930f1044dc9bfe76e5a',
            cluster: 'eu',
            forceTLS: true,
        });
        this.laravelEco.join(`Messenger.${this.userId}`)
            .listen('.new-message',(data)=>{
                this.messages.push(data.message);
                let container = document.querySelector('#chat-body');
                container.scrollTop = container.scrollHeight;
            });


        this.chatChannel =  this.laravelEco.join('Chat')
            .joining((user) => {

                for (let i in this.conversations) {
                    let conversation = this.conversations[i];

                    if (conversation.participants[0].id == user.id) {
                        this.conversations[i].participants[0].isOnline = true;
                        return;
                    }

                }
            })
            .leaving((user) => {
                for (let i in this.conversations) {
                    let conversation = this.conversations[i];
                    if (conversation.participants[0].id == user.id) {
                        this.conversations[i].participants[0].isOnline = false;
                        return;
                    }
                }
            })
            .listenForWhisper('typing', (e) => {
           let user = this.findUser(e.id, e.conversation_id);

           if (user) {
               user.isTyping = true;
           }
       })
           .listenForWhisper('stopped-typing', (e) => {
               let user = this.findUser(e.id, e.conversation_id);
               if (user) {
                   user.isTyping = false;
               }
           });
    },
    methods: {
        moment(time) {
            return moment(time);
        },
        isOnline(user) {
            for (let i in this.users) {
                if (this.users[i].id == user.id) {
                    return this.users[i].isOnline;
                }
            }
            return false;
        }, findUser(id, conversation_id) {
            for (let i in this.conversations) {
                let conversation = this.conversations[i];
                if (conversation.id === conversation_id && conversation.participants[0].id == id) {
                    return this.conversations[i].participants[0];
                }
            }
        },

        },
});
chatApp.component('Messenger', Messenger);
chatApp.component('ChatList', ChatList);
chatApp.mount('#chat-app');
