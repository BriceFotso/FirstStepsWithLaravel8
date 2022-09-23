@extends('layout')
@section('content')
<h3 style="color:blue;">Affichage</h3></br></br>
<div class="table-wrapper">
    <table class="fl-table">
        <thead style="height: 5px;">
            <tr>
                <td colspan="7"></td>
            </tr>
        </thead>
        <tbody>
            @if($eleve)

            <p class="">ID : <label for="" class="">{{$eleve->id}}</label></p>
            <p class="">Nom : <label for="" class="">{{$eleve->nom}}</label></p>
            <p class="">Prenom : <label for="" class="">{{$eleve->prenom}}</label></p>
            <p class="">email : <label for="" class="">{{$eleve->email}}</label></p>
            <p class="">telephone : <label for="" class="">{{$eleve->telephone}}</label></p>
            <p class="">Niveau : <label for="" class="">{{$eleve->niveau}}</label></p>
            <p class="">Photo : <img src="/photo/{{ $eleve->photo }}" width="64" height="64"></label></p>

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
            @endif
        </tbody>

    </table>
    <div style="width:650px;">
     
    </div>
</div>

@endsection