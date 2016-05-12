@extends('layouts.default')
@extends('layouts.menu')
@section('players')
    <button class="btn-default" ><a href="player/create">Create New Player</a></button>
    <table>
        @foreach($players as $player)
            <tr>
                <td><img src="{{$player->image}}" alt="" width="50px"></td>
                <td><a href="{{action('PlayersController@show',[$player->id])}}">{{$player->first_name}} {{$player->last_name}}</a></td>
                <td>{{$player->position_player}}</td>
                <td>{{$player->team->team_name}}</td>
                <td>{{$player->country}}</td>
                <td>{{$player->games}}</td>
                <td>{{$player->goals}}</td>
                <td><a href="player/{{$player->id}}/edit">Update</a></td>
                <td>{!!  Form::open(array('url' => 'player/' . $player->id, 'class' => 'pull-right'))  !!}
                    {!!   Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach
    </table>
    <div>
        {{$players->render()}}
    </div>
@stop