<h1>Créer un nouveau projet</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description"></textarea>

    <label for="start_date">Date de début :</label>
    <input type="date" name="start_date" id="start_date">

    <label for="end_date">Date de fin :</label>
    <input type="date" name="end_date" id="end_date">

    <button type="submit">Enregistrer</button>
</form>
