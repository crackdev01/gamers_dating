<template>
<!-- <a href="#">View Profile</a> -->
    <div class="conversation">
        <h1>{{ contact ? contact.name : 'Select a Contact' }}</h1>
        <!-- -> <a href="#">{{ contact ? contact.id : 'View profile' }}</a> -->
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
    import MessageComposer from './MessageComposer';
    import MessagesFeed from './MessagesFeed';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }

                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style lang="scss" scoped>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed #a8a8a8;
        color: #1666a0;
        font-weight: bold;
    }
}
</style>
