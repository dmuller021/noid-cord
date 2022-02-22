@extends('layouts.app')


@section('content')

    <div>
        <header>
            <input type="hidden" name="username_general" id="username_general" placeholder="username" value="{{ Auth::user()->name }}">
            <br>
        </header>
    </div>
    <br>
    <div id="messages_general"></div>
    <br>
    <br>
    <form id="message_form_general">
        <input type="text" autocomplete="off" name="Message" id="Message" placeholder="type a message...">
        <button type="submit" onclick="clear()" id="message_send">Send message</button>
    </form>
    </div>

    <script>
        function clear() {
            document.getElementById("message_form_general").reset();
        }
    </script>
    <script src="{{ asset('js/chat.js') }}" defer></script>


@endsection
