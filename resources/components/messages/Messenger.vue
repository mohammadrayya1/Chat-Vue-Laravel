<template>
    <main class="main is-visible" data-dropzone-area="">
        <div class="container h-100">

            <div  class="d-flex flex-column h-100 position-relative">
                <!-- Chat: Header -->
                <Chat-header  />
                <!-- Chat: Header -->

                <!-- Chat: Content -->
                <Chat-content  />
                <!-- Chat: Content -->

                <!-- Chat: Footer -->
                <Chat-footer  />
                <!-- Chat: Footer -->
            </div>
        </div>
    </main>
</template>

<script>

import ChatHeader from '../messages/ChatHeader.vue';
import ChatContent from '../messages/ChatContent.vue';
import ChatFooter from '../messages/ChatFooter.vue';



export default {
    components: {
        ChatHeader, ChatContent, ChatFooter
    },

}
</script>
