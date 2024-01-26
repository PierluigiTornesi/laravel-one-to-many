@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @include('partials.previous_button')

        
        <h2><strong>Title Project : </strong>{{ $project->title}}</h2>

        <div class="mt-4 w-50">
            <p>
                <strong>Description : </strong>{{ $project->description}}
            </p>
        </div>

        <div class="mt-4 w-50">
            <p>
                <strong>Slug : </strong>{{ $project->slug}}
            </p>
        </div>

        <div>
            <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug])}}">Edit</a>

            <form class="d-inline-block" action="{{ route('admin.projects.destroy' , [ 'project' => $project->slug])}}" method="POST">
                @csrf
                @method('DELETE')
                
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

@endsection