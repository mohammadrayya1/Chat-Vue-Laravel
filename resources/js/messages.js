require('./bootstrap');

import { createApp  } from "vue";

import Messenger from "../components/messages/Messenger.vue"
import ChatList from "../components/messages/ChatList.vue";


const chatApp = createApp({
    data() {
        return {
            conversations: [],
            conversation: null,
            messages: [],
            userId: userId,
            csrf_token:csrf_token

        }
    },
    methods: {
        moment(time) {
            return moment(time);
        }
        },
});
chatApp.component('Messenger', Messenger);
chatApp.component('ChatList', ChatList);
chatApp.mount('#chat-app');
