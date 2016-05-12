@extends('layouts.default')

@section('teams')
    <table>

        <tr>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->gender}}</td>
        </tr>
    </table>
    <ul>
    @foreach($user->team as $team)
        <li>{{$team->team_name}}</li>
    @endforeach
    </ul>
@stop