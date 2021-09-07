@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez une vidéo</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form class="d-flex flex-column  w-75 mt-5" enctype="multipart/form-data" action="{{route('videos.store')}}" method="post">
        @csrf

        <label for="url">Url :</label>
        <input value="{{old('url')}}" type="text" name="url" id="url">
    
        <label for="img">Image : </label>
        <input value="{{old('img')}}" type="file" name="img" id="img">
    
        <label for="description">Description : </label>
        <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>

        <label for="duration">Durée : </label>
        <input value="{{old('duration')}}" type="text" name="duration" id="duration">
    
        <label for="title">Titre : </label>
        <input value="{{old('title')}}" type="text" name="title" id="title">
        
        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection