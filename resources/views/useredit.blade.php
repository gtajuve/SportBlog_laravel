@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('username') !!}
                            {!! Form::text('username') !!}
                            {{$errors->first('username')}}
                        </div>
                        <div  class="form-group">
                            {!! Form::label('email') !!}
                            {!! Form::text('email') !!}
                            {{$errors->first('email')}}

                        </div>
                        <div  class="form-group">
                            {!! Form::label('Gender: ') !!}
                            {!! Form::label('Male') !!}
                            {!! Form::radio('gender', 'male') !!}
                            {!! Form::label('Female') !!}
                            {!! Form::radio('gender', 'female') !!}

                        </div>
                        <div  class="form-group">
                            {!! Form::label('Team') !!}
                            {!! Form::select('teams[]',$teams,$user->teams,['multiple']) !!}
                        </div>
                        {!! Form::submit('Save') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
