@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>{{ $project->name }}</h1>
                <p>{{ $project->description }}</p>
                <hr>
                <h2>Tasks:</h2>
                @if(count($tasks) > 0)
                    <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item" style="background: whitesmoke ">
                                <h3>
                                    <a href="{{ route('projects.tasks.show',[$project->slug, $task->slug]) }}">{{ $task->name }}</a>
                                </h3>
                                <small>{{ $task->created_at }}</small>
                            </li>
                            <br>
                        @endforeach
                    </ul>
                    {{ $tasks->links() }}
                @else
                    <p>No tasks found for {{ $project->name }}</p>
                @endif
                <hr>
                <a class="btn btn-info" href="{{ route('projects.tasks.create', $project->slug) }}">Create Task</a>
                <a class="btn btn-warning" href="{{ route('projects.edit', $project->slug) }}">Edit Project</a>
                <form style="display: inline" action="{{ url('projects/'.$project->slug) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete Project" class="btn btn-danger">
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection
