@extends('template.main')

@section('content')

<section class="container my-5 d-flex justify-content-center">

    <div class="card my-5" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$video->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$video->url}}</h6>
            <p>{{$video->img}}</p>
            <p class="card-text">{{$video->description}}</p>
            <div class="d-flex justify-content-around">
                <a class="btn btn-warning" href="{{route('videos.edit', $video->id)}}">Modifier</a>
                <form action="{{route('videos.destroy', $video->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection