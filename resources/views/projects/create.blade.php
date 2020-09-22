@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>Create New Project</h1>

                <form action="{{ url('projects') }}" method="post">
                    {{csrf_field()}}
                    <label for="project_name">Name:</label>
                    <input id="project_name" name="project_name" type="text" class="form-control">
                    <label for="project_slug">Slug:</label>
                    <input id="project_slug" name="project_slug" type="text" class="form-control">
                    <label for="project_description">Description:</label>
                    <textarea id="project_description" name="project_description" class="form-control" rows="5"></textarea>
                    <br>
                    <input type="submit" value="Create" class="btn">
                    <a class="btn btn-primary" style="float: right" href="{{ route('projects.index') }}">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
