require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let token = document.head.querySelector('meta[name="csrf-token"]')

const friends_input = document.getElementById("friendID");
var messages_el = document.getElementById("messages");

const image_input = document.getElementById("image");
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
console.log(image_input);

message_form.addEventListener('submit', function (e) {


    e.preventDefault();

    let has_errors = false;

    if (username_input.value == '') {
        alert("Please enter a username");
        has_errors = true;
    }

    if (message_input.value == '') {
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
            privateMessage: message_input.value,
            friendID: friends_input.value,
            image: image_input.value
        }
    }

    axios(options);
});

window.Echo.channel('friends.'+friends_input.value).listen('.DM', (data) => {

    messages_el.innerHTML += `

            <div class="row mb-4">
                <div class="small_image col-1" style="background-image: url( ${data.image} )"></div>
                    <div class="flex-grow-2 ms-1 col-9">
                        <strong><h5 class="mt-0">${data.user}:</h5></strong>

                        <div>
                            <div class="flex-grow-2">
                                <p>${data.privateMessage}</p>
                            </div>
                       </div>
                    </div>

            </div>

    `;

    messages_el.scrollTop = messages_el.scrollHeight

    message_input.value = "";

});


