@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>Create New Task</h1>

                <form action="{{ url('projects/'.$project->slug.'/tasks') }}" method="post">
                    {{csrf_field()}}
                    <label for="task_name">Name:</label>
                    <input id="task_name" name="task_name" type="text" class="form-control">
                    <label for="task_slug">Slug:</label>
                    <input id="task_slug" name="task_slug" type="text" class="form-control">
                    <label for="task_description">Description:</label>
                    <textarea id="task_description" name="task_description" class="form-control" rows="5"></textarea>
                    <br>
                    <input type="submit" value="Create" class="btn">
                    <a class="btn btn-primary" style="float: right" href="{{ route('projects.show',$project->slug) }}">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
