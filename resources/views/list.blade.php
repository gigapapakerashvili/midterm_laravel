@extends('master')

@section('pageTitle', 'Tasks List')

@section('content')
    <h1 class="display-6">Tasks</h1>
    <a href="{{route('tasks.create')}}">Create New</a>
    <hr/>


    <table class="table">
        <thead>
        <th>{{ __('Task') }}</th>
        <th>{{ __('Status') }}</th>
        <th colspan="3">{{ __('Actions') }}</th>
        </thead>

        @foreach($tasks as $task)
            <tr class="@if($task->deleted_at !== null) bg-dark @endif">
                <td>{{$task->task}}</td>
                @if($task->done === 0)
                    <td class="text-danger">{{ __('Not done yet!') }}</td>
                @elseif ($task->done === 1)
                    <td class="text-success">{{ __('Done!') }}</td>
                @else
                    <td class="text-warning">{{ __('Without status!') }}</td>
                @endif

                <td>
                    <div class="d-flex">
                        <a href="{{route('tasks.show', $task->id)}}" class="btn btn-info m-1">Details</a>
                        <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-primary m-1">Edit</a>

                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger m-1">Delete Post</button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

@endsection
