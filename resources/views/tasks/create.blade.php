<h1>Ajouter une tâche au projet : {{ $project->name }}</h1>

<form action="{{ route('projects.tasks.store', $project->id) }}" method="POST">
    @csrf

    <label for="name">Nom de la tâche :</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description"></textarea>

    <label for="status">Statut :</label>
    <select name="status" id="status">
        <option value="pending">En attente</option>
        <option value="in progress">En cours</option>
        <option value="completed">Terminée</option>
    </select>

    <label for="due_date">Date limite :</label>
    <input type="date" name="due_date" id="due_date">

    <button type="submit">Ajouter la tâche</button>
</form>

<a href="{{ route('projects.tasks.index', $project->id) }}">Retour à la liste des tâches</a>
