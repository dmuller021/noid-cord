@extends('layouts.app')


@section('content')


    <div style="padding-left: 25%; padding-right: 25%;">
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
        <div class="row">
            <div class="col-10">
        <input type="text" class="form-control input_class" autocomplete="off" name="Message" id="Message"  placeholder="type a message...">
            </div>

            <div class="col">
        <button class="btn btn-primary" type="submit" id="message_send">Send</button>
            </div>
        </div>
        </div>
    </form>
    </div>
    </div>



    <script src="{{ asset('js/chat.js') }}" defer></script>


@endsection
