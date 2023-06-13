@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        <div class="d-flex justify-content-between pb-5">
            <h1 class="text-white">Progetti</h1>
            <div>
                <a class="btn btn-primary me-3" href="{{ route('admin.dashboard') }}">Torna alla dashboard</a>
                <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea nuovo Progetto</a>

            </div>

        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-3 mb-5">
                    <div class="card bg-dark text-white">
                        <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <span class="card-text">Creato il: {{ $project->created_at }}</span>
                            <span class="card-text">Tecnologia: <strong>{{ $project->type->name }}</strong></span>

                            <div class="d-flex justify-content-between pt-4">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning text-white"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="delete-button btn btn-danger"
                                        data-item-title="{{ $project->title }}"> <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endsection
