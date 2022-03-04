@extends('layouts.app')

@section('content')

    <div class="container text-center mt-4 mb-4 mx-auto">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="text-center">
                <form action="{{ url('/searchUser') }}" type="get">
              <input name="searchUser" class="form-control mb-2" value="">
              <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>

{{--    <div class="row">--}}
{{--        <div class="col">test</div>--}}
{{--        <div class="col">test</div>--}}
{{--        <div class="col">test</div>--}}
{{--    </div>--}}
    @isset($searchedUser)
        @foreach($searchedUser as $user)
        <div class="profile mt-4">
            <div class="card mb-4 card_Class text-center">
                <div class="lala mx-auto mb-3" style="background-image: url( {{ asset('assets/images/'.$user->image_path) }} )"></div>
                <div class="col">{{ $user->username }}</div>
                {{ $user->description }}
                <a href="/user/{{ $user->username }}" class="btn btn-primary">View profile</a>
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
