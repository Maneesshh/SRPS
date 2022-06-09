@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Add users</h2>
            </div>
        </div>
        @if (session('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
        @endif
        <div class="main-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Add new User</div>
                        <div class="card-body">
                            <form method="POST" action="{{('addusers')}}" enctype="multipart/form-data">
                                @csrf
                                <!-- Select dropdown option for Role-->
                                <div >
                                    <x-label for="role_id" value="{{ __('Select User Type:') }}" />
                                    <select name="role_id"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="parents">Parents</option>
                                        <option value="teachers">Teachers</option>
                                        <option value="admin" disabled>Admin</option>
                                    </select>
                                </div><br>
                                <!-- Name -->
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                        required autofocus />
                                </div>
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required />
                                </div>
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required autocomplete="new-password" />
                                </div>
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                        name="password_confirmation" required />
                                </div>
                                <div class="mt-4">
                                    <x-label for="address" value="{{ __('Address:') }}" />
                                    <x-input type="text" class="block mt-1 w-full" id="add" name="add"
                                        placeholder="Enter Your Address" required="" maxlength="40" />
                                </div>
                                <x-label for="phone" value="{{ __('Contact:') }}" />
                                <x-input type="text" max="10" class="blocl mt-1 w-full" id="phone" name="phone" required=""
                                    placeholder="10 digit Contact Number" maxlength="10" pattern="[0-9]+" />
                                <div class="mt-4">
                                    <x-label for="gender" value="{{ __('Gender:') }}" />
                                    <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option selected="" value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Other</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <x-label for="photo" value="{{ __('Image:') }}" />
                                    <x-input type="file" class="block mt-1 w-full" id="photo" name="photo"
                                        accept=".png , .jpeg , .jpg" required="" />
                                </div>
                                <div class="row my-3">
                                    <div class="col-5"></div>
                                    <div class="col mb-3">         
                                            <x-button class="ml-4">
                                        {{ __('Add') }}
                                    </x-button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endsection
