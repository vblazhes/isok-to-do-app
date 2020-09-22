@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h1>Projects</h1>
                @if(count($projects)>0)
                    <ul class="list-group">
                        @foreach($projects as $project)
                            <li class="list-group-item" style="background: whitesmoke">
                                <h3><a href="{{ route('projects.show', $project->slug) }}">{{$project->name}}</a></h3>
                                <small>{{$project->created_at}}</small>
                            </li>
                            <br>
                        @endforeach
                    </ul>
                @else
                    <p>No projects found!</p>
                @endif

            </div>
        </div>
    </div>
@endsection
