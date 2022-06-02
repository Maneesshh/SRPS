@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('img/myimage.png') }}" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <p class="text-secondary mb-1">Name:{{ Auth::user()->name }}</p>
                            <p class="text-secondary mb-1">Email:{{ Auth::user()->email }}</p>
                            {{-- <p class="text-muted font-size-sm">Contact Number</p> --}}
                            <button class="btn btn-primary">Edit profile</button>
                            <button class="btn btn-primary">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <nav-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </nav-link>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
