@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">ADD Student</h2>

            </div>
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
        @endif
            <form class="form" method="post" action="{{'addstudent'}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <x-label for="default" class="col-sm-2 control-label">Class</x-label>
                    <div class="col-sm-15">
                        <select name="class" class="form-control w-full" id="default" required="required">
                            <option value="" class="block mt-1 w-full" >Select Class</option>
                            @foreach ($classes as $items)
                                <option value="{{ $items->id }}">{{ $items->classname }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <x-label for="default" class="col-sm-2 control-label">Section</x-label>
                    <div class="col-sm-15">
                        <select name="section" class="form-control w-full" id="default" required="required">
                            <option value="" class="block mt-1 w-full" >Select Section</option>
                            @foreach ($classes as $items)
                                <option value="{{ $items->section }}">{{ $items->section }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <x-label for="default" class="col-sm-2 control-label">Parent</x-label>
                    <div class="col-sm-15">
                        <select name="parent" class="form-control w-full" id="default">
                            <option value="" class="block mt-1 w-full" >Select Section</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div><br>
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
                                <x-button class="ml-7">
                            {{ __('Add') }}
                        </x-button> 
                    </div>
            </form>
        </div>
    @endsection
