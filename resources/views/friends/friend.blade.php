@extends('layouts.app')


@section('content')


    <h1>Let's chat!</h1><br>

    @foreach($friends as $friend)
        @csrf

{{--                {{ dd($friends) }}--}}
        @if($friend->user_id_1 == $id)


            <div>
                <form action="friends/{{ $friend->id }}/chat">
                    <div class="container">
                    <p>{{ $friend->name2 }}</p>
                    <button class="btn btn-primary" type="submit">Message</button>
                    </div>
                </form>
            </div>

        @else
            <div>
                <form action="friends/{{ $friend->id }}/chat">
                    <div class="container">
                    <p>{{ $friend->name1 }}</p>
                    <button class="btn btn-primary" type="submit">Message</button>
                    </div>
                </form>
            </div>
        @endif
    @endforeach


@endsection
