require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const messages_el_general = document.getElementById("messages_general");
const image_input_general = document.getElementById("image");
const username_input_general = document.getElementById("username_general");
const message_input_general = document.getElementById("Message");
const message_form_general = document.getElementById("message_form_general");
// var privateChannel = pusher.subscribe("friends.")


console.log(message_input_general);
console.log(username_input_general);

message_form_general.addEventListener('submit', function (a) {
    a.preventDefault();

    let has_errors = false;

    if (username_input_general.value == null) {
        alert("Please enter a username");
        has_errors = true;
    }

    if (message_input_general.value == null) {
        alert("Please enter a message");
        has_errors = true;
    }

    if (has_errors) {
        return;
    }



    const options = {
        method: 'post',
        url: '/send-Message',
        data: {
            username: username_input_general.value,
            message: message_input_general.value,
            image: image_input_general.value
        }
    }
    axios(options);
});




window.Echo.channel('chat').listen('.message', (data) => {

    messages_el_general.innerHTML += `

            <div class="row mb-4">
                <div class="small_image col-4" style="background-image: url( ${data.image} )"></div>
                    <div class="flex-grow-2 ms-1 col-1 mt-3">
                        <strong><h5 class="mt-0">${data.username}:</h5></strong>
                    </div>
                        <div class="col-7">
                            <div class="flex-grow-2 ms-2 mt-3">
                                <p>${data.message}</p>
                            </div>
                       </div>
            </div>

    `;

});