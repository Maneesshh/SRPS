@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-3 pe-2 pb-2">
                <div class="card c1">
                    <div class="card-header pt-5 ">
                        <p class="num">{{ $students }}</p>
                        <p class="title">Students</p>
                    </div>
                    <div class="card-footer">
                    <a href="{{'managestudent'}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>     
                  </div>
                </div>
            </div>
            <div class="col-sm-3 pe-2 pb-2">
                <div class="card c1">
                    <div class="card-header pt-5 ">
                        <p class="num">{{ $teachers }}</p>
                        <p class="title">Teachers</p>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-3 pe-2 pb-2">
                <div class="card c1">
                    <div class="card-header pt-5 ">
                        <p class="num">{{ $parents }}</p>
                        <p class="title">Parents</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{'manageparent'}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>     
                      </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 pe-2 pb-2">
                <div class="card c1">
                    <div class="card-header pt-5 ">
                        <p class="num">{{ $class }}</p>
                        <p class="title">Class</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{'manageclass'}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>     
                      </div>
                </div>
            </div>
            <div class="col-sm-3 pe-2 pb-2">
                <div class="card c1">
                    <div class="card-header pt-5 ">
                        <p class="num">{{ $exam }}</p>
                        <p class="title">Exam</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{'manageexam'}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>     
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
