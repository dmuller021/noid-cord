require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let token = document.head.querySelector('meta[name="csrf-token"]')

const friends_input = document.getElementById("friendID");
const messages_el = document.getElementById("messages");
const username_input = document.getElementById("username");
const message_input = document.getElementById("privateMessage");
const message_form = document.getElementById("message_form");
// var privateChannel = pusher.subscribe("friends.")

function clear() {
    document.getElementById("message_form").reset();
}

console.log(friends_input);
console.log(message_input);
console.log(username_input);

message_form.addEventListener('submit', function (e) {
    e.preventDefault();

    let has_errors = false;

    if (username_input.value == null) {
        alert("Please enter a username");
        has_errors = true;
    }

    if (message_input.value == null) {
        alert("Please enter a message");
        has_errors = true;
    }

    if (has_errors) {
        return;
    }



    const options = {
        method: 'post',
        url: '/send-privateMessage',
        data: {
            user: username_input.value,
            friendID: friends_input.value,
            privateMessage: message_input.value
        }
    }

    axios(options);
});

window.Echo.channel('friends.'+friends_input.value)
    .listen('.DM', (e) => {
        messages_el.innerHTML += '<div class="messages"><strong>' + e.user + ': </strong> ' + e.privateMessage
            + '</div>',

        message_input.innerHTML = '<div class="messsage_input" value=""></div>'
        console.log(e);
    })


