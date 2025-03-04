@extends('layouts.app') 
{{-- ou votre layout principal --}}

@section('content')
    <div class="container">
        <h2>Créer un nouveau projet</h2>

        {{-- Message de succès s'il existe --}}
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Affichage des éventuelles erreurs de validation --}}
        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST" class="project-form">
            @csrf
            <div class="form-group">
                <label for="title">Titre du projet</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
            </div>

            <button type="submit" class="btn-submit">Enregistrer</button>
        </form>
    </div>
@endsection
