@extends('layouts.default')

@section('teams')
    <table>

            <tr>
                <td>{{$team->team_name}}</td>
                <td>{{$team->address}}</td>
            </tr>

    </table>
@stop