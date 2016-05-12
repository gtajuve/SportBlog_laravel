@extends('layouts.default')
@extends('layouts.menu')
@section('countrys')
    <table>
        @foreach($countrys as $country)
            <tr>
                <td>{{$country->country_name}}</td>

            </tr>
        @endforeach
    </table>
    <div>
        {{$countrys->render()}}
    </div>
@stop
