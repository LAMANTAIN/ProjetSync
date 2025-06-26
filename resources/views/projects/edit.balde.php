<h1>Modifier le projet : {{ $project->name }}</h1>

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="{{ $project->name }}" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description">{{ $project->description }}</textarea>

    <label for="start_date">Date de début :</label>
    <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}">

    <label for="end_date">Date de fin :</label>
    <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}">

    <button type="submit">Mettre à jour</button>
</form>

<a href="{{ route('projects.index') }}">Retour à la liste des projets</a>
