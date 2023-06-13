@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Titolo del progetto: {{ $project->title }}</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna ai progetti</a>
        </div>
        <h5 class="mb-5">Descrizione: {{ $project->description }}</h5>
        <div class="d-flex align-items-center">
            <span class="fw-bold me-3">Tecnologia utilizzata: </span>
            <div class="d-flex flex-column align-items-center">
                <img src="/img/{{ $project->type->image }}" alt="{{ $project->type->name }}" style="width:80px">
                <span class="fw-bold">{{ $project->type->name }}</span>
            </div>

            <span class="ms-3">{{ $project->type->description }}</span>
        </div>
        <div class="py-5">
            <h2>Anteprima:</h2>
            <img src="{{ $project->image }}" alt="{{ $project->title }}" style="width: 100%">
        </div>
        @if ($project->tags && count($project->tags) > 0)
            <div>
                <h3>Tag del progetto:</h3>
                @foreach ($project->tags as $tag)
                    <a href="#" class="badge rounded-pill text-bg-info">{{ $tag->title }}</a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
