@extends('modele');

@section('titre','modifier depuis le tableau')

@section('contents')

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>
        Modifier une pizza !
    </h1>

    <form method="post" action="{{route('editNom',['id'=>$pizza->id])}}">
        <label>
            <input type="text" name="nom" value="{{$pizza->nom}}">
        </label>
        <label>
            <input type="text" name="description" value="{{$pizza->description}}">
        </label>
        <input type="submit" value="Modifier">
        @csrf
    </form>

@endsection
