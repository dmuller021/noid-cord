require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


var messages_el_general = document.getElementById("messages_general");
const image_input_general = document.getElementById("image");
const username_input_general = document.getElementById("username_general");
var message_input_general = document.getElementById("Message");
const message_form_general = document.getElementById("message_form_general");





console.log(username_input_general);



//event listener
message_form_general.addEventListener('submit', function (a) {
    a.preventDefault();

    let has_errors = false;

    if (username_input_general.value == '') {
        alert("Please enter a username");
        has_errors = true;
    }

    if (message_input_general.value == '') {
        has_errors = true;
    }

    if (has_errors) {
        return;
    }

 // tags are being replace with an empty value function
    function stripTags (original) {
        return original.replace(/(<([^>]+)>)/gi, '');
    }

    // variable for message input without html tags made
    var cleaned = stripTags(message_input_general.value);


    const options = {
        method: 'post',
        url: '/send-Message',
        data: {
            username: username_input_general.value,
            message: cleaned,
            image: image_input_general.value
        }
    }
    axios(options);
});




window.Echo.channel('chat').listen('.messages', (data) => {

    messages_el_general.innerHTML += `

            <div class="row mb-4">
                <div class="small_image col-1" style="background-image: url( ${data.image} )"></div>
                    <div class="flex-grow-2 ms-1 col-9">
                        <strong><h5 class="mt-0">${data.username}:</h5></strong>

                        <div>
                            <div class="flex-grow-2">
                                <p>${data.message}</p>
                            </div>
                       </div>
                    </div>

            </div>
    `;

    //scrollbar will automatically scroll down when a new message has been outputted
    messages_el_general.scrollTop = messages_el_general.scrollHeight

        // outputs nothing when string is empty
        message_input_general.value = "";




});





