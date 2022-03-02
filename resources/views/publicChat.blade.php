@extends('layouts.app')


@section('content')

    <div>
        <header>
            <input type="hidden" name="username_general" id="username_general" placeholder="username" value="{{ Auth::user()->username }}">
            <br>
        </header>
    </div>
    <br>
    <div id="messages_general" class="messages_general h-20 justify-center mx-auto mb-4"></div>
    <br>
    <br>



    <form id="message_form_general">
        <div class="text-center">
        <input type="hidden" name="image" id="image" value="{{ asset ( url( 'assets/images/'.Auth::user()->image_path) )  }}">
        <input type="text" class="input_class" autocomplete="off" name="Message" id="Message" placeholder="&lt;b&gt;cool&lt;/b&gt;">
        <input class="text-align" type="submit" onclick="tags();" id="message_send"></input>
        </div>
    </form>
    </div>

    <script>

    </script>

    <script src="{{ asset('js/chat.js') }}" defer></script>


@endsection
