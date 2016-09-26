<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chatroom</div>

                    <div class="message">
                        <li v-for="item in messages">
                            <div class="main">
                                <div class="text" v-if="item.from">
                                    <strong>{{ item.from }}:</strong> {{ item.message }}
                                </div>
                                <div class="info" v-else>
                                    {{ item.message }}
                                </div>
                            </div>
                        </li>
                    </div>

                    <textarea placeholder="Enter to send" v-model="content" @keyup="keyup" rows=1 cols=40></textarea>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        ready() {
            console.log("Chat is ready!");
        },
        data() {
            return {
                messages: this.$parent.messages,
                content: ''
            }
        },
        methods: {
            keyup(e) {
                if (!e.shiftKey && e.keyCode === 13 && this.content.trim().length) {
                    this.disabled = "disabled"
                    this.$http
                        .post('/message', {'message': this.content.trim()})
                        .then((response) => {
                            if (response.json().status === "ok") {
                                this.content = ''
                            }
                            this.disabled = '';
                        }, (response) => {
                            this.disabled = '';
                            console.error(response)
                        })
                }
            }
        }
    }
</script>

<style scoped>
textarea {
    width:100%;
}
.message li {
    list-style: none;
    padding: .2em .5em;
}

.info {
    text-align: right;
    font-style: italic;
}

.text strong {
    min-width: 10em;
    display: inline-block;
    text-align: right;
}
</style>
