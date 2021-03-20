@extends('modele')

@section('titre','pizzas pizeeria')
@if( session()->has('etat'))
    <p style="color: #c10a0a; font-weight: bold; font-size: 40px;background-color: #cbd5e0;text-align: center" class="etat">{{session()->get('etat')}}</p>
@endif

@unless(empty($pizzas))
    @if(Auth::user()->type =='admin')
    <table>
        <tr>
            <th> ID</th><th> Nom</th><th> prix</th> <th> description </th><th> creatd_at</th><th> updated_at</th><th>deleted_at </th>
        </tr>

        @section('contents')
            @foreach($pizzas as $pizza)

                <tr><td>{{$pizza->id}}</td>
                    <td>{{$pizza->nom}}</td>
                    <td>{{$pizza->prix}}</td>
                    <td>{{$pizza->description}}</td>
                    <td>{{$pizza->created_at}}</td>
                    <td>{{$pizza->updated_at}}</td>
                    <td>{{$pizza->deleted_at}}</td>
                    <td><a href="{{{route('nomEditForm',['id'=>$pizza->id])}}}">Modifier pizza</a></td>
                    <td><a href="{{{route('nomDeleteForm',['id'=>$pizza->id])}}}">Supprimer une pizza</a></td>
                </tr>
            @endforeach
    </table

    @endsection
@else
        <table>
            <tr>
                <th> ID</th><th> Nom</th><th> prix</th> <th> description </th><th> Ajout</th>
            </tr>

            @section('contents')
                @foreach($pizzas as $pizza)

                    <tr><td>{{$pizza->id}}</td>
                        <td>{{$pizza->nom}}</td>
                        <td>{{$pizza->prix}}</td>
                        <td>{{$pizza->description}}</td>
                        <td><a href="{{{route('add_panier',['id'=>$pizza->id])}}}">Ajouter au panier</a></td>
                    </tr>
                @endforeach
        </table

        @endsection
@endif
@endunless
