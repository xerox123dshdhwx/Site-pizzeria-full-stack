@extends('modele')
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('titre')</title>
<body>
@section('admin visu')
<div>
    @auth
        <a href="{{route('noms')}}">Voir les noms</a><br/>
        <a href="{{route('pizza')}}">Voir les pizza</a><br/>
        <a href="{{route('create')}}">Crée les pizza</a><br/>
        <a href="{{route('commande')}}">Voir les commandes</a><br/>
    @endauth
</div>
@endsection
</body>
</html>
