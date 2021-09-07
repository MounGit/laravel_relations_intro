@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Vidéos</h2>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="d-flex justify-content-center my-5">
    <a class="btn btn-success" href="{{route('videos.create')}}">Ajouter une vidéo</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Url</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($video as $data)
                <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->url}}</td>
                <td>{{$data->img}}</td>
                    <td class="d-flex justify-content-around">
                    <a class="btn btn-primary" href="{{route('videos.show', $data->id)}}">Détails</a>
                    <a class="btn btn-warning" href="{{route('videos.edit', $data->id)}}">Modifier</a>
                    <form action="{{route('videos.destroy', $data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
          </tr>
            @endforeach

        </tbody>
      </table>

</section>

@endsection