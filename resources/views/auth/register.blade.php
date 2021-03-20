
@extends('modele')
@section('contents')
    <p>Enregistrement</p>
    <form method="post">
        Nom: <label>
            <input type="text" name="nom" value="{{old('nom')}}">
        </label>
        Prenom: <label>
            <input type="text" name="prenom" value="{{old('prenom')}}">
        </label>
        Login: <label>
            <input type="text" name="login" value="{{old('login')}}">
        </label>
        MDP: <label>
            <input type="password" name="mdp">
        </label>
        Confirmation MDP: : <label>
            <input type="password" name="mdp_confirmation">
        </label>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
