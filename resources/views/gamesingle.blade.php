@extends('layouts.default')
@extends('layouts.menu')
@section('games')
    <table>
            <tr>
                <td><img src="{{$game->hometeam->image}}" alt="" width="50px"></td>
                <td>{{$game->hometeam->team_name}}</td>
                <td><a href="{{action('GamesController@show',[$game->id])}}">{{$game->score}}</a></td>
                <td>{{$game->awayteam->team_name}}</td>
                <td><img src="{{$game->awayteam->image}}" alt="" width="50px"></td>

            </tr>
    </table>
    <div>
        <ul>
       @foreach($player as $p)
           <li>{{$p->first_name}} {{$p->last_name}} {{$p->team->team_name}}</li>
           @endforeach
        </ul>
    </div>
@stop