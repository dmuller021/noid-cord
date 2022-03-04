@extends('layouts.app')

@section('content')

    {{--    <section style="background-color: #eee;">--}}
    <div class="container py-5">

        @foreach($view as $user)
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="lala mx-auto" style="background-image: url( {{ asset('assets/images/'.$user->image_path) }} )"></div>
                        <h5 class="my-3">{{ $user->username }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                            @if($user->id != Auth::user()->id)
                             <form method="post" action="friends/friend_request">
                            <button type="button" class="btn btn-outline-primary ms-1">Send friend request</button>
                             </form>
                            @endif
                            {{--                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Ramat Gan, Israël.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <p class="mb-0">Description</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach


@endsection
