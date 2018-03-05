@extends('layouts.master')
@section('header')
    <h2><a href="user"> CRUD Operation</a></h2>
@endsection
@section('content')
    <a href="user/create" class="btn btn-primary">Create</a>

    {!! Form::open(['method'=>'GET','url'=>'user','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
    <div class="input-group custom-search-form">
        <input type="text" class="form-control" name="search" placeholder="Search...">
        <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="glyphicon glyphicon-search"></i>
        </button>
    </span>
    </div>
    {!! Form::close() !!}
    <table class="table table-bordered table-responsive" style="margin-top: 10px">
        <thead>
        <tr>
            <th>I.D.</th>
            <th>Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Education</th>
            <th colspan="2">Image</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
    @if(count($users)>0)
        @forelse($users as $user)
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->gender}}</td>
                    <td>
                        <?php
                            $data=$user->education;
                            if (empty($data)){
                                echo "No education field value";
                            }else{
                            $uns=unserialize($data);
                            foreach($uns as $un){
                                echo $un." ";
                            }
                          }
                        ?>
                    </td>
                    <td><img src="{{URL::to('userImage/'.$user->image)}}" width="40"></td>
                        <td>
                            {{--<form action="{{url::to('user.image'),$user->id}}" method="get">--}}
                                {{--<input type="button" name="delete" id="delete" value="Delete" class="btn btn-danger">--}}
                            {{--</form>--}}

                            {!! Form::open(array('action' => array('UserController@image', $user->id)))!!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-success">Edit</a></td>
                        <td>
                        {!! Form::open(['method'=>'delete','route'=>['user.destroy',$user->id]]) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                <td>
                    <a href="{{route('user.show',$user->id)}}" class="btn btn-primary">Detail</a>

                </td>
                </tr>
            </tbody>
                @empty
        @endforelse
        @else
            <tr>
                <td colspan="7"><b> <i>Data not Found</i> </b></td>
            </tr>
        @endif
    </table>
    {!! $users->render() !!}

@endsection


