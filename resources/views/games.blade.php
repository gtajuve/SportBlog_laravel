@extends('layouts.default')
@extends('layouts.menu')
@section('games')
    <table>
        @foreach($games as $game)
            <tr>
                <td><img src="{{$game->hometeam->image}}" alt="" width="50px"></td>
                <td>{{$game->hometeam->team_name}}</td>
                <td><a href="{{action('GamesController@show',[$game->id])}}">{{$game->score}}</a></td>
                <td>{{$game->awayteam->team_name}}</td>
                <td><img src="{{$game->awayteam->image}}" alt="" width="50px"></td>

            </tr>
        @endforeach
    </table>
    <div>
        {{$games->render()}}
    </div>
@stop