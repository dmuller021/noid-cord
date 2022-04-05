@extends('layouts.app')

@section('content')

{{--    {{ dd($requests) }}--}}


    @isset($requests)
        <div class="row">
            @foreach($requests as $user)
                <div class="profile col-3 mt-4">
                    <div class="card mb-4 card_Class text-center">
                        <div class="lala mx-auto mb-3" style="background-image: url( {{ asset('assets/images/'.$user->image_path) }} )"></div>
                        <div class="col">{{ $user->name }}</div>
                        {{ $user->description }}
                        <form method="POST" action="{{ route('accept') }}" value="{{ $user->id }}">
                            @csrf
                            @method('post')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn btn-success" type="submit">Accept</button>
                        </form>


                        <form method="GET" action="{{ route('deny') }}">
                            @csrf
                            @method('get')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn btn-danger" type="submit">Deny</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset




@endsection
