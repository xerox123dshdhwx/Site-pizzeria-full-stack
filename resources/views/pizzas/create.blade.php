@extends('modele')


@section('contents')
    <form method="post">
         <label>Nom:
            <input type="text" name="nom" value="{{ old("nom")}}">
        </label>
        <br/>
        <label>Prix:
            <input type="text" name="prix" value="{{ old("prix")}}">
        </label>
        <br/>
         <label> Description:
            <textarea name="description">{{old("description")}}</textarea>
        </label>
        <input type="submit" value="Envoyer">
    @csrf

@endsection
