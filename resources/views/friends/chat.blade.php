@extends('layouts.app')


@section('content')

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

<div style="padding-left: 25%; padding-right: 25%;">
    <div>
        <header>
            <input type="hidden" name="username" id="username" placeholder="username" value="{{ Auth::user()->username }}">
            <br>
        </header>
    </div>

    <br>
    <div id="messages" class="messages_general h-20 justify-center mx-auto mb-4"></div>
    <br>
    <br>
    <form id="message_form">
       <div class="text-center">
           <input type="hidden" name="image" id="image" value="{{ asset ( url( 'assets/images/'.Auth::user()->image_path) ) }}">
           <div class="row">
               <div class="col-10">
                    <input type="text"  class="form-control input_class" autocomplete="off" name="privateMessage" id="privateMessage" placeholder="type a message...">
               </div>

               <div class="col">
                    <button class="btn btn-primary" type="submit" id="message_send">Send</button>
               </div>
           </div>
       </div>
    </form>
    </div>
</div>

    <script src="{{ asset('js/app.js') }}" defer></script>


@endsection
