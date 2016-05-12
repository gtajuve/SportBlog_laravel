@extends('layouts.default')
@extends('layouts.menu')
@section('teams')
    <div>
        {!! Form::open(['method'=>'get','url'=>'/team']) !!}

        <div class="form-control">
            {!! Form::label('perPage') !!}
            {!! Form::select('perPage',array('5'=>'5','10'=>'10','20'=>'20'),$perPage) !!}

        </div>
        <div class="form-control">
            {!! Form::label('country') !!}
            {!! Form::select('country_id',$countrys) !!}

        </div>
        {!! Form::submit('filters') !!}

        {!! Form::close() !!}
    </div>
    <hr>

    <button class="btn-default" ><a href="team/create">Create New Team</a></button>
    <table>
        @foreach($teams as $team)
            <tr>
                <td><img src="{{$team->image}}" alt="" width="50px"></td>
                <td><a href="{{action('TeamsController@show',[$team->id])}}">{{$team->team_name}}</a></td>
                <td>{{$team->country->country_name}}</td>
                <td>{{$team->address}}</td>
                <td><a href="team/{{$team->id}}/edit">Update</a></td>
                <td>{!!  Form::open(array('url' => 'team/' . $team->id, 'class' => 'pull-right'))  !!}
                    {!!   Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                    {!! Form::close() !!}</td>
            </tr>
        @endforeach
    </table>
    <div>{{$teams->render()}}</div>
@stop