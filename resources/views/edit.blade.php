@extends('layout')
@section('content')
<h2 style="color:blue;">Edition et Modification </h2>

<form method="POST" action="{{ route('eleve.update',$eleve->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" value="{{$eleve->nom}}"/>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" name="prenom" value="{{$eleve->prenom}}"/>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value="{{$eleve->email}}"/>
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone:</label>
        <input type="text" class="form-control" name="telephone" value="{{$eleve->telephone}}"/>
    </div>

    <div class="form-group">
        <label for="niveau">Niveau:</label>

        <select name="niveau" style="width: 100%;">
            <!-- Les options -->
            <option value="6ème" @if($eleve->niveau=="6ème") selected @endif>6ème</option>
            <option value="5ème" @if($eleve->niveau=="5ème") selected @endif>5ème</option>
            <option value="4ème" @if($eleve->niveau=="4ème") selected @endif>4ème</option>
            <option value="3ème" @if($eleve->niveau=="3ème") selected @endif>3ème</option>
            <option value="2nde" @if($eleve->niveau=="2nde") selected @endif>2nde</option>
            <option value="1ère" @if($eleve->niveau=="1ère") selected @endif>1ère</option>
            <option value="terminale" @if($eleve->niveau=="terminale") selected @endif>Terminale</option>
        </select>
    </div>

    <div class="form-group">
        <label for="photo">Photo :</label>
        <input type="file" name="photo" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-success" style="float:right; width:300px;">METTRE A JOUR</button>
</form>

@endsection