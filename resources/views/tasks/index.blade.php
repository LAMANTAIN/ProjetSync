<h1>Tâches pour le projet : {{ $project->name }}</h1>

<a href="{{ route('projects.tasks.create', $project->id) }}">Ajouter une tâche</a>

<ul>
    @foreach ($tasks as $task)
        <li>
            <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}">{{ $task->name }}</a>
            ({{ $task->status }})
            <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('projects.show', $project->id) }}">Retour au projet</a>

