<h1>Modifier la tâche : {{ $task->name }}</h1>

<form action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nom de la tâche :</label>
    <input type="text" name="name" id="name" value="{{ $task->name }}" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description">{{ $task->description }}</textarea>

    <label for="status">Statut :</label>
    <select name="status" id="status">
        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>En attente</option>
        <option value="in progress" {{ $task->status == 'in progress' ? 'selected' : '' }}>En cours</option>
        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Terminée</option>
    </select>

    <label for="due_date">Date limite :</label>
    <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}">

    <button type="submit">Mettre à jour la tâche</button>
</form>

<a href="{{ route('projects.tasks.index', $project->id) }}">Retour à la liste des tâches</a>
