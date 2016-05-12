@extends('layouts.default')
@extends('layouts.menu')
@section('messages')
    <table>
        @foreach($messages as $message)
            <tr>
                <td>{{$message->user->username}}</td>
                <td><img src="{{$message->team->image}}" alt="" width="50px"></td>
                <td>{{$message->team->team_name}}</td>
                <td>{{$message->title}}</td>
                <td>{{$message->message}}</td>

            </tr>
        @endforeach
    </table>
@stop