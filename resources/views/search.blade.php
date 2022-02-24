@extends('layouts.app')

@section('content')

    <div class="container mb-4">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="justify-center">
                <form action="{{ url('/searchUser') }}" type="get">
              <input name="searchUser" class="form-control mb-2" value="">
              <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col">test</div>--}}
{{--        <div class="col">test</div>--}}
{{--        <div class="col">test</div>--}}
{{--    </div>--}}
    @isset($searchedUser)
        @foreach($searchedUser as $user)
    <div class="container">
        <div class="profile">
            <div class="card mb-4 card_Class text-center">
                <div class="lala mx-auto mb-3" style="background-image: url( {{ asset('assets/images/'.$user->image_path) }} )"></div>
                <div class="col">{{ $user->name }}</div>
                {{ $user->description }}
                <a href="/user/{{ $user->id }}" class="btn btn-primary">View profile</a>
            </div>
        </div>
    </div>
        @endforeach
    @endisset

{{--    <div class="row">--}}
{{--        <div class="col-lg-4 col-lg-offset-4">--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" class="form-control" placeholder="Search....." />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}





@endsection
