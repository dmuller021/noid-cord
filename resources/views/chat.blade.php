@extends('layouts.app')


@section('content')

<h1>Let's chat!</h1>
<div>
    <header>
    <input type="hidden" name="username" id="username" placeholder="username" value="{{ Auth::user()->name }}">
    <br>
    </header>
</div>
<br>
<div id="messages"></div>
    <form id="message_form">
        <input type="text" name="message" id="message_input" onfocus="this.value=''" placeholder="type a message...">
        <button type="submit" id="message_send">Send message</button>
    </form>
</div>

@endsection
