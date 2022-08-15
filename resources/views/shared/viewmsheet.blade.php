@extends('layouts.app')
@section('content')

    <div class="content " id="bgimg" >  
        <div><button type="button" class="btn btn-outline-info" style="position: absolute; top:60px; right:50px;" onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16"><path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path><path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"></path></svg></button>
        <div class="center">
            <img src="ABC/images/logo.png" width="70" alt=""/>
                <h3 class="font-effect-shadow-multiple"><p>Student Result Generating System</p></h3><br>
                <h4>certificate</h4>
                <br>
            <section>   This certificate is awarded to {{ $student }} of class {{$class}} in recognition of his/her excellence efforts and achievement in being an outstanding student and winning the
                {{ $exam }} exam in the session - 2021-2022. his exam total mark is 220 .
                <img src="/img/sig.jpg" width="100" alt=""/>Signature</section>
        </div>

    </div>

               <input type="hidden" name="class" id="class" value="{{ $class }}">
                <input type="hidden" name="exam" id="exam" value="{{ $exam }}">
                <input type="hidden" name="student" id="class" value="{{ $student }}">


@endsection
