@extends('layouts.default')


@section('content')
    {!! Form::model($player,['method'=>'PATCH','action'=>['PlayersController@update',$player->id]]) !!}
    <div class="form-control">
        {!! Form::label('first_name') !!}
        {!! Form::text('first_name') !!}
        {{$errors->first('first_name')}}
    </div>
    <div class="form-control">
        {!! Form::label('last_name') !!}
        {!! Form::text('last_name') !!}
        {{$errors->first('last_name')}}
    </div>
    <div class="form-control">
        {!! Form::label('country') !!}
        {!! Form::text('country') !!}
        {{$errors->first('country')}}
    </div>
    <div class="form-control">
        {!! Form::label('image') !!}
        {!! Form::text('image') !!}
        {{$errors->first('image')}}
    </div>
    <div class="form-control">
        {!! Form::label('games') !!}
        {!! Form::input('number', 'games') !!}
        {{$errors->first('games')}}
    </div>
    <div class="form-control">
        {!! Form::label('goals') !!}
        {!! Form::input('number', 'goals') !!}
        {{$errors->first('goals')}}
    </div >
    <div>
        {!! Form::label('position') !!}
        {!! Form::select('position_player',array(
        'G'=>'Вратар',
        'D'=>'Защитник',
        'M'=>'Полузащитник',
        'F'=>'Нападател',
        )) !!}
        {{$errors->first('position_player')}}
    </div>
    <div class="form-control">
        {!! Form::label('team') !!}
        {!! Form::select('team_id',$teams) !!}
        {{$errors->first('team_id')}}
    </div>
    {!! Form::submit('Save') !!}
    {!! Form::close() !!}
@stop
