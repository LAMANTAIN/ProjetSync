<h1>Liste des projets</h1>

<a href="{{ route('projects.create') }}">Créer un nouveau projet</a>

<ul>
    @foreach ($projects as $project)
        <li>
            <a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a>
            <a href="{{ route('projects.edit', $project->id) }}">Modifier</a>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>
