@extends('layouts.master')
@section('header')
    <h2>Edit User</h2>
@endsection
@section('content')
     {!! Form::model($user,['route'=>['user.update',$user->id],'method'=>'PATCH','class'=>'form-horizontal','files'=>'true']) !!}
    <div class="form-group">
        {!! Form::label('name','Name',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-5">
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            {!! $errors->has('name')?$errors->first('name'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('address','Address',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-5">
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
            {!!$errors->has('address')?$errors->first('address'):'' !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('gender','Gender',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-5">
            {!! Form::radio('gender','Male') !!} Male<br>
            {!! Form::radio('gender','Female') !!} Female
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('education','Education',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-5">
            {!! Form::checkbox('education[]','slc')!!}SLC <br>
            {!! Form::checkbox('education[]','intermediate')!!}Intermediate<br>
            {!! Form::checkbox('education[]','bachelors') !!}Bachelor<br>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('','Image',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-5">
            <img src="{{URL::to('userImage/'.$user->image)}}" class="img-responsive thumbnail"  >
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('image','Upload Image',['class'=>'control-label col-md-2']) !!}
        <div class="col-md-5">
            {!! Form::file('image') !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-5">
            {!! Form::submit('Save',['class'=>'btn tn-primary'])!!}
            <a href="{{route('user.index')}}" class="btn btn-primary">Home</a>
        </div>
    </div>
    
    {!! Form::close() !!} 
@endsection
