@extends('layouts.app')


@section('content')

    <h1>Let's chat!</h1>


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
    <div id="messages"></div>
    <br>
    <br>
    <form id="message_form">
        <input type="text" autocomplete="off" name="privateMessage" id="privateMessage" placeholder="type a message...">
        <button type="submit" onclick="clear()" id="message_send">Send message</button>
    </form>
    </div>

    <script>
        function clear() {
            document.getElementById("message_form").reset();
        }
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>


@endsection
