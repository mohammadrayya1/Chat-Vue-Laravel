
import { createApp  } from "vue";
import Messenger from "../components/messages/Messenger.vue"
import ChatList from "../components/messages/ChatList.vue";


const chatApp = createApp({});
chatApp.component('Messenger', Messenger);
chatApp.component('ChatList', ChatList);
chatApp.mount('#chat-app');
