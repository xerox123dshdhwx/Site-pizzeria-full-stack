@extends('modele')

@section('contents')
    <table>
        <tr>
            <th> ID</th><th> user_id</th><th> status</th><th> creatd_at</th><th> updated_at</th>
        </tr>

        <tr>
            @foreach($commandes as $commande)
                <td>{{$loop->iteration}} : {{$commande->id}}</td>
                <td>{{$loop->iteration}} : {{$commande->user_id}}</td>
                <td>{{$loop->iteration}} : {{$commande->creatd_at}}</td>
                <td>{{$loop->iteration}} : {{$commande->updated_at}}</td>
            @endforeach
        </tr>
        {{$commandes->links()}}
    </table>

@endsection
