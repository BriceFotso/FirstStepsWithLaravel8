@extends('layout')
@section('content')
<h2 style="color:blue;">Ajout d'un nouveau élève </h2>

<form method="POST" action="{{ route('eleve.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" />
    </div>
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" name="prenom" />
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" />
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone:</label>
        <input type="text" class="form-control" name="telephone" />
    </div>

    <div class="form-group">
        <label for="niveau">Niveau:</label>

        <select name="niveau" style="width: 100%;">
            <!-- Les options -->
            <option value="6ème">6ème</option>
            <option value="5ème">5ème</option>
            <option value="4ème">4ème</option>
            <option value="3ème">3ème</option>
            <option value="2nde">2nde</option>
            <option value="1ère">1ère</option>
            <option value="terminale">Terminale</option>
        </select>
    </div>

    <div class="form-group">
        <label for="photo">Photo :</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-success" style="float:right; width:300px;">Ajouter</button>
</form>

@endsection