@extends('master')

@section('pageTitle', 'Create A Task')

@section('content')
    <h1 class="display-6">Create New Task</h1>

    <hr/>

    <!-- if validation in the controller fails, show the errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Open the form with the store function route. -->
    {{ Form::open(['action' => '\App\Http\Controllers\TaskController@store']) }}

    <!-- Include the CRSF token -->
    {{Form::token()}}


    <!-- build our form inputs -->
    <div class="form-group">
        {{Form::label('task', 'Task')}}
        {{Form::text('task', '', ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('done', 'Done')}}
        {!! Form::select('done', [ 0 => 'Undone', 1 => 'Done' ], null, ['class' => 'form-control']) !!}
    </div>

    <!-- build the submission button -->
    {{Form::submit('Create!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}

@endsection
