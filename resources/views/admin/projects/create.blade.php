@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @include('partials.previous_button')

        
        <h2 class="text-center">
            Create a new project
        </h2>

        <form class="mt-5 " action="{{ route('admin.projects.store')}}" method="POST">
            @csrf
            {{-- title input --}}
            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- type input --}}
            <div class="mb-3 has-validation">
                <label for="type">Select the type</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">No type</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            {{-- description input --}}
            <div class="mb-3 has-validation">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ old('description')}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-danger" type="submit">Save</button>
        </form>
    </div>
@endsection