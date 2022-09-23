@extends('layout')
@section('content')
<h3 style="color:blue;">Liste des élèves</h3></br></br>
<div class="table-wrapper">
    <table class="fl-table">
        <thead style="height: 5px;">
            <tr>
                <th>   ID   </th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Niveau</th>
                <th>Photo</th>
                <th>Afficher </th>
                <th>Mettre à jour </th>
                <th>Supprimer</th>
            </tr>
            <tr>
                <td colspan="7"></td>
            </tr>
        </thead>
        <tbody>
            @foreach($eleves as $eleve)
            <tr>
                <td>{{$eleve->id}}</td>
                <td>{{$eleve->nom}}</td>
                <td>{{$eleve->prenom}}</td>
                <td>{{$eleve->email}}</td>
                <td>{{$eleve->telephone}}</td>
                <td style="color:brown; font-weight: bold;">{{$eleve->niveau}}</td>
                <td><img src="/photo/{{ $eleve->photo }}" width="64" height="64"></td>
                <td style="vertical-align:middle; ">
                    <form method="POST" align="left">
                        <a ; class="btn btn-info" href="{{ route('eleve.show' , $eleve->id)  }}">Afficher</a>
                    </form>
                </td>

                <td style="vertical-align:middle; ">
                    <form method="POST" align="left">
                        <a class="btn btn-primary" href="{{ route('eleve.edit' , $eleve->id)  }}">Editer</a>
                    </form>
                </td>

                <td style="vertical-align:middle; ">
                    <form method="POST" align="left" action="{{route('eleve.destroy' , $eleve->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div style="width:650px;">
     
    </div>
</div>

@endsection