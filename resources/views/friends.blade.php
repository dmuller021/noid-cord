@extends('layouts.app')


@section('content')


    <h1>Let's chat!</h1>

    @foreach($friends as $friend)
        @csrf
{{--        {{ dd($friend) }}--}}
            @if($friend->user_id_1 == $id)


                <div>
                    <button class="btn btn-primary" type="submit">{{ $friend->name2 }}</button>
               </div>

            @else
            <div>
                    <button class="btn btn-primary" type="submit">{{ $friend->name1 }}</button>
            </div>
            @endif
    @endforeach


@endsection
