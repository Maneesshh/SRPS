@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Profile</h2>
            </div>
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
        @endif
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">User Info</div>
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ Auth::user()->photo }}" alt="Admin" class="rounded-circle p-1 bg-primary"
                                        width="200"><br>
                                    <div class="mt-3">
                                        <h4>Name:{{ Auth::user()->name }}<br><br>
                                            Email:{{ Auth::user()->email }}<br><br>
                                            Address:{{ Auth::user()->address }} <br><br>
                                            Phone:{{ Auth::user()->phone }} <br><br>
                                            Gender:{{ Auth::user()->gender }} <br><br>

                                        </h4><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">Change User Profile</div>
                            <div class="card-body">
                                <form method="POST" action="{{ 'updateprofile' }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}" />
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6><br>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->name }}"><br>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6><br>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}"><br>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6><br>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ Auth::user()->phone }}"><br>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6><br>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="address"
                                                value="{{ Auth::user()->address }}"><br>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6><br>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-control" name="gender" required="required">
                                                <option value="{{ Auth::user()->gender }}" selected hidden>
                                                    {{ Auth::user()->gender }}</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>

                                            </select><br>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Image</h6><br>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" id="photo" name="photo" value="{{ Auth::user()->photo }}"
                                                accept=".png , .jpeg , .jpg" /><br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary " style="align-items: center">
                                                <button type="submit" class="btn btn-primary px-6">Update</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Change Password</div>
                      <form method="POST" action="{{ route('change.password') }}">
                          @csrf
                          @foreach ($errors->all() as $error)
                              <p class="text-danger">{{ $error }}</p>
                          @endforeach
                         <br>  <div class="row mb-3">
                              <div class="col-sm-6">
                                  <h6 class="mb-0">Current Password</h6>
                              </div>
                              <div class="col-sm-5 text-secondary">
                                  <x-input id="password" type="password" class="form-control" name="current_password"
                                      autocomplete="current-password"/>
                              </div>
                          </div><br>
                          <div class="row mb-3">
                              <div class="col-sm-6">
                                  <h6 class="mb-0">New Password</h6>
                              </div>
                              <div class="col-sm-5 text-secondary">
                                  <x-input id="new_password" type="password" class="form-control" name="new_password"
                                      autocomplete="current-password"/>
                              </div>
                          </div><br>
                          <div class="row mb-3">
                              <div class="col-sm-6">
                                  <h6 class="mb-0">Conform New Password</h6>
                              </div>
                              <div class="col-sm-5 text-secondary">
                                  <x-input id="new_confirm_password" type="password" class="form-control"
                                      name="new_confirm_password" autocomplete="current-password"/>
                              </div>
                          </div><br>
                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">Update Password</button>
                              </div>
                          </div><br>
                      </form>
                  </div>
            </div>
            </div>
        </div>
    </div>
@endsection
