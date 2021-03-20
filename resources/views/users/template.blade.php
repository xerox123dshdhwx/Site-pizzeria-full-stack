@extends('modele')

@section('titre','users pizeeria')
@if( session()->has('etat'))
    <p style="color: #c10a0a; font-weight: bold; font-size: 40px;background-color: #cbd5e0;text-align: center" class="etat">{{session()->get('etat')}}</p>
@endif

@unless(empty($users))
    <table>
        <tr>
            <th> ID</th><th> Noms</th> <th> Prenom </th><th> login</th><th> mdp</th><th> type</th>
        </tr>

        @section('contents')
            @foreach($users as $user)

                <tr><td>{{$user->id}}</td>
                    <td>{{$user->nom}}</td>
                    <td>{{$user->prenom}}</td>
                    <td>{{$user->login}}</td>
                    <td>{{$user->mdp}}</td>
                    <td>{{$user->type}}</td>
                </tr>
            @endforeach
    </table>

    @endsection
@endunless
