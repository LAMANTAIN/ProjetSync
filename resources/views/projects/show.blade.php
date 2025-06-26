<h1>{{ $project->name }}</h1>

<p>Description : {{ $project->description }}</p>
<p>Date de début : {{ $project->start_date }}</p>
<p>Date de fin : {{ $project->end_date }}</p>

<h2>Tâches associées</h2>

<a href="{{ route('projects.tasks.create', $project->id) }}">Ajouter une tâche</a>

<ul>
    @foreach ($project->tasks as $task)
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

<a href="{{ route('projects.index') }}">Retour à la liste des projets</a>
