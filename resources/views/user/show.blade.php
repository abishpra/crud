@extends('layouts.master')
@section('header')
    <h2>User Profile</h2>
@endsection
@section('content')
    {{--Part One--}}
     <div class="content">
       <div class="row">
           <div class="col-md-12">
               <div class="col-md-4">
                   <img src="{{URL::to('userImage/'.$user->image)}}" class="img-responsive thumbnail">
               </div>
               <div class="col-md-5"  >
                   <h1><b>{{$user->name}}</b></h1>
                   <h4>{{$user->gender}}</h4>
                   <h4><i class="glyphicon glyphicon-map-marker"></i>{{$user->address}}</h4>
                   <h4><i class="glyphicon glyphicon-certificate"></i>@for ($i = 0; $i<count($user->education);  $i++)
                          {{ucfirst($user->education[$i])}}
                            @if($i<count($user->education)-1)
                                {{","}}
                            @endif
                       @endfor
                   </h4>
               </div>
           </div>
       </div>
   </div>
    {{--part one end--}}

{{--part two--}}

    {{--{!! Form::model($user,['class'=>'form-horizontal']) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('name','Name',['class'=>'control-label col-md-2']) !!}--}}
        {{--<div class="col-md-5">--}}
            {{--{!! Form::text('name', null,  ['class'=>'form-control','readonly']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('address','Address',['class'=>'control-label col-md-2']) !!}--}}
        {{--<div class="col-md-5">--}}
            {{--{!! Form::text('address', null, ['class'=>'form-control','readonly']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('gender','Gender',['class'=>'control-label col-md-2']) !!}--}}
        {{--<div class="col-md-5">--}}
            {{--{!! Form::text('gender',null,['class'=>'form-control','readonly']) !!}--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('education','Education',['class'=>'control-label col-md-2']) !!}--}}
        {{--<div class="col-md-5">--}}
            {{--@for ($i = 0; $i<count($user->education);  $i++)--}}
                {{--<input type="text" name="education" value="@if (isset($user->education[$i])) {{ $user->education[$i] }} @else {{"No education"}} @endif" class="form-control" readonly>--}}
            {{--@endfor--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('','Image',['class'=>'control-label col-md-2']) !!}--}}
        {{--<div class="col-md-5">--}}
            {{--<img src="{{URL::to('userImage/'.$user->image)}}" class="img-responsive thumbnail"  >--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
        {{--<div class="col-md-offset-2 col-md-5">--}}
            {{--<a href="{{route('user.index')}}" class="btn btn-primary">Home</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
{{--part two end--}}

{{--part three--}}


            {{--<div class="col-md-12">--}}

                {{--<div class="content">--}}
            {{--<div class="row ">--}}
                {{--<div class="col-md-5">--}}
                 {{--<img src="{{URL::to('userImage/'.$user->image)}}" class="img-thumbnail" >--}}
                    {{--</div>--}}
            {{--<div class="col-md-5"  >--}}
            {{--<h1><b>{{$user->name}}</b></h1>--}}
            {{--<h3>{{$user->address}}</h3>--}}
            {{--<h4>{{$user->gender}}</h4>--}}
            {{--<h4>@for ($i = 0; $i<count($user->education);  $i++)--}}
            {{--{{ucfirst($user->education[$i])}}--}}
            {{--@endfor--}}
            {{--</h4>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<h1><b>{{$user->name}}</b></h1>--}}
                {{--<h4>{{$user->gender}}</h4></i>--}}
                {{--<h4><i class="glyphicon glyphicon-certificate"></i>@for ($i = 0; $i<count($user->education);  $i++)--}}
                    {{--{{ucfirst($user->education[$i])}}--}}
                        {{--@if($i<count($user->education)-1)--}}
                            {{--{{","}}--}}
                        {{--@endif--}}
                    {{--@endfor--}}
                {{--</h4>--}}
                {{--<h4> <i class="glyphicon glyphicon-map-marker"></i>{{$user->address}}</h4>--}}

            {{--</div>--}}
    {{--</div>--}}




    {{--part three end--}}
@endsection
