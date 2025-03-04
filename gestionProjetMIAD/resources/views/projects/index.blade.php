@extends('layouts.app')

@section('content')
<h1>Mes projets</h1>
<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        @forelse($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->status }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Aucun projet</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
