"use strict"

/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
Vue.component('chat', require('./components/Chat.vue'));

const app = new Vue({
    el: 'main',
    data: {
        messages: []
    }
})
const MAX = 12

window.Echo
    .join('chatroom')
    .here((e) => {
        app.messages.push({message: "You've joined the chatroom."})
    })
    .joining((e) => {
        Vue.http.get('/username/' + e).then((response) => {
            app.messages.push({message: response.json().name + " has joined"})
        }, (response) => {
            console.error(response)
        })
    })
    .leaving((e) => {
        Vue.http.get('/username/' + e).then((response) => {
            app.messages.push({message: response.json().name + " has left"})
        }, (response) => {
            console.error(response)
        })
    })
    .listen('Message', (e) => {
        app.messages.push(e)
        if (app.messages.length > MAX) {
            app.messages.splice(0, app.messages.length - MAX)
        }
    })
