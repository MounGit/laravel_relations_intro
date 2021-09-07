@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez un commentaire</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form class="d-flex flex-column  w-75 mt-5" enctype="multipart/form-data" action="{{route('commentaires.store')}}" method="post">
        @csrf

        <label for="nom">Nom :</label>
        <input value="{{old('nom')}}" type="text" name="nom" id="nom">
    
        <label for="prenom">Prénom : </label>
        <input value="{{old('prenom')}}" type="text" name="prenom" id="prenom">
    
        <label for="contenu">Commentaire : </label>
        <textarea name="contenu" id="contenu" cols="30" rows="10">{{old('contenu')}}</textarea>

        <label for="datePublication">Date de publication : </label>
        <input value="{{old('datePublication')}}" type="date" name="datePublication" id="datePublication">
    
        <label for="video">Vidéo : </label>
        <select class="form-select" aria-label="Default select example" id="video" name="video_id">
            <option selected>Sélectionnez une vidéo</option>
            @foreach ($video as $data)
        <option value="{{$data->id}}">{{$data->title}}</option>
            @endforeach

          </select>
        
        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection