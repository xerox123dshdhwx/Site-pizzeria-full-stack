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
        {{$user->nom}} Want to modify his user password
    </h1>

    <form method="post" action="{{route('edit',['id'=>$user->id])}}">
        <label>
            <input type="text" name="nom" value="{{$user->nom}}">
        </label>
        <label>
            <input type="password" name="mdp" value="">
        </label>
        <input type="submit" value="Modifier">
        @csrf
    </form>

@endsection
