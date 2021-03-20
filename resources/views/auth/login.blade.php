@extends('modele')
@section('contents')
    <form method="post">
        Login: <label>
            <input type="text" name="login" value="{{old('login')}}">
        </label>
        MDP: <label>
            <input type="password" name="mdp">
        </label>
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
