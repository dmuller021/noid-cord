@extends('layouts.app')


@section('content')



{{--        {{ dd($friends) }}--}}
    <div>
        <header>
            @foreach($friends as $friend)
                @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="friendID" id="friendID" placeholder="friendID" value="{{ $friend->id }}">
            @endforeach
            <br>
        </header>
    </div>


    <div>
        <header>
            <input type="hidden" name="username" id="username" placeholder="username" value="{{ Auth::user()->name }}">
            <br>
        </header>
    </div>
    <br>
    <div id="messages" class="messages_general h-20 justify-center mx-auto mb-4"></div>
    <br>
    <br>
    <form id="message_form">
       <div class="text-center">
        <input type="text"  class="input_class" autocomplete="off" name="privateMessage" id="privateMessage" placeholder="type a message...">
        <input type="hidden" name="image" id="image" value="{{ asset ( url( 'assets/images/'.Auth::user()->image_path) ) }}">
        <button class="text-align" type="submit" onclick="clear()" id="message_send">Send message</button>
       </div>
    </form>
    </div>

    <script>
        function clear() {
            document.getElementById("message_form").reset();
        }
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>


@endsection
