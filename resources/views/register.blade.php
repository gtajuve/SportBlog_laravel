@extends('layouts.default')
@section('content')
    {!! Form::open(['url'=>'/user']) !!}
    <div>
        {!! Form::label('username') !!}
        {!! Form::text('username') !!}
        {{$errors->first('username')}}
    </div>
    <div>
        {!! Form::label('email') !!}
        {!! Form::text('email') !!}
        {{$errors->first('email')}}

    </div>
    <div>
        {!! Form::label('password') !!}
        {!! Form::password('password') !!}
        {{$errors->first('password')}}
    </div>
    <div>
        {!! Form::label('Gender: ') !!}
        {!! Form::label('Male') !!}
        {!! Form::radio('gender', 'male') !!}
        {!! Form::label('Female') !!}
        {!! Form::radio('gender', 'female') !!}

    </div>
        {!! Form::submit('Save') !!}
    {!! Form::close() !!}
@stop
