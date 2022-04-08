@extends('layouts.app')


@section('content')


    <h1>Let's chat!</h1><br>

    @foreach($friends as $friend)
        @csrf

{{--                {{ dd($friends) }}--}}

        @if($friend->user_id_1 == $id)

            <div>
                <form action="friends/{{ $friend->id }}/chat">
                   <div class="text-center">
                    <div class="card card_Class mb-4">
                    <div class="lala mx-auto" style="background-image: url( {{ asset('assets/images/'.$friend->image2) }} )"></div>
                    <p>{{ $friend->username2 }}</p>
                        <div class="row">
                            <div class="col-4">
                                <button class="btn btn-primary" type="submit">Message</button>
                            </div>

                            <div class="col-4"></div>

                            <div class="col-4">
                                <a href="{{ url('user/'.$friend->username2) }}" class="btn btn-primary">Profile</a>
                            </div>
                        </div>
                    </div>
                   </div>
                </form>
            </div>

        @else
                <form action="friends/{{ $friend->id }}/chat">
                    <div class="text-center">
                    <div class="card card_Class mb-4">
                        <div class="lala mx-auto" style="background-image: url( {{ asset('assets/images/'.$friend->image1) }} )"></div>
                    <p>{{ $friend->username1 }}</p>
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit">Message</button>
                                </div>

                                <div class="col-4"></div>

                                <div class="col-4">
                                    <a href="{{ url('user/'.$friend->username1) }}" class="btn btn-primary">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    @endforeach


@endsection
