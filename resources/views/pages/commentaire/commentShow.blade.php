@extends('template.main')

@section('content')

<section class="container my-5 d-flex justify-content-center">

    <div class="card my-5" style="width: 20rem;">
        <div class="card-body">
            <h4 class="card-subtitle mb-2 text-muted">Vidéo : </h4>
            <h2>{{$commentaire->video->title}}</h2>
            <h4 class="card-subtitle mb-2 text-muted">Nom : </h4>
            <h3 class="card-title">{{$commentaire->nom}} {{$commentaire->prenom}}</h3>
            <h4 class="card-subtitle mb-2 text-muted">Commentaire : </h4>
            <p>{{$commentaire->contenu}}</p>
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('commentaires.edit', $commentaire->id)}}">Modifier</a>
                <form action="{{route('commentaires.destroy', $commentaire->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection