@extends('layouts.default')
@extends('layouts.menu')
@section('users')

    <table>
        @foreach($users as $user)
            <tr>

                <td><a href="user/{{$user->id}}">{{$user->username}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->gender}}</td>
                <td><a href="user/{{$user->id}}/edit">Update</a></td>

            </tr>
        @endforeach
    </table>
@stop