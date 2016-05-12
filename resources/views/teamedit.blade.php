@extends('layouts.default')


@section('content')
    {!! Form::model($team,['method'=>'PATCH','action'=>['TeamsController@update',$team->id]]) !!}
    <div class="form-control">
        {!! Form::label('team_name') !!}
        {!! Form::text('team_name') !!}
        {{$errors->first('team_name')}}
    </div>
    <div class="form-control">
        {!! Form::label('address') !!}
        {!! Form::text('address') !!}
        {{$errors->first('address')}}

    </div>
    <div class="form-control">
        {!! Form::label('image') !!}
        {!! Form::text('image') !!}
        {{$errors->first('image')}}
    </div>
    <div class="form-control">
    {!! Form::label('country') !!}
    {!! Form::select('country_id',$countrys) !!}
    {{$errors->first('image')}}
    </div>
    {!! Form::submit('Save') !!}

    {!! Form::close() !!}
@stop
