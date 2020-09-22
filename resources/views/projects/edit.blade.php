@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>Edit {{ $project->name }}</h1>

                <form action="{{ url('projects/'.$project->slug) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="PUT">

                    <label for="project_name">Name:</label>
                    <input id="project_name" name="project_name" type="text" class="form-control" value="{{ $project->name }}">
                    <label for="project_slug">Slug:</label>
                    <input id="project_slug" name="project_slug" type="text" class="form-control" value="{{ $project->slug }}">
                    <label for="project_description">Description:</label>
                    <textarea id="project_description" name="project_description" class="form-control" rows="5">{{ $project->description }}</textarea>
                    <br>
                    <input type="submit" value="Update" class="btn">
                    <a class="btn btn-primary" style="float: right" href="{{ route('projects.show', $project->slug) }}">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
