@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>{{ $task->name }}</h1>
                <p>{{ $task->description }}</p>
                @if($task->completed == true)
                    <div class="alert alert-success">
                        Task has been completed!
                    </div>

                @else
                    <div class="alert alert-danger">
                        Task has not been completed!
                    </div>
                @endif
                <small style="float: right">{{ $task->created_at }}</small>
                <br>
                <hr>
                <a class="btn btn-warning" href="{{ route('projects.tasks.edit', [$project->slug, $task->slug]) }}">Edit Task</a>
                <form style="display: inline" action="{{ url('projects/'.$project->slug.'/tasks/'.$task->slug) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" value="Delete Task">
                </form>

                <a class="btn btn-primary" style="float: right" href="{{ route('projects.show',$project->slug) }}">Go Back</a>
            </div>
        </div>
    </div>
@endsection
