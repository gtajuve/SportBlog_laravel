@extends('layouts.default')
@section('content')

    {!! Form::open(['url'=>'/auth/login']) !!}
    <div>
        {!! Form::label('username') !!}
        {!! Form::text('username') !!}
        {{$errors->first('username')}}
    </div>
    <div>
        {!! Form::label('password') !!}
        {!! Form::password('password') !!}
        {{$errors->first('password')}}
    </div>

    {!! Form::submit('Влез') !!}
    {!! Form::close() !!}

    <a href="/user/create">Регистрирай се</a>

@stop

