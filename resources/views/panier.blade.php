@extends('modele');


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
{{-- <pre>{{var_dump(\Illuminate\Support\Facades\Session::all())}}</pre> --}}


<fieldset>
    <legend>Panier</legend>
    <div>
        <span style="visibility: hidden">{{$total = 0,
                            $value = 0}}</span>
        @unless(empty($pizzas))
            @foreach($pizzas as $pizza)
                <span style="visibility: hidden">{{ $value =  \Illuminate\Support\Facades\Session::get('pizza.'.$pizza->id) }}</span><br>

            @if(\Illuminate\Support\Facades\Session::get('pizza.'.$pizza->id) != null)
                        <form style="visibility: hidden">{{-- a mettre sinon error 500 sur la premier pizza je sais pas pourquoi!--}}@csrf</form>

                        <form action="{{route('panier_modif',['id'=>$pizza->id])}}">
                            <label>Pizza : {{$pizza->nom}}
                                <input type="number" name="value" min="0" value="{{$value}}">
                                <a href="{{route('delete_pizza',['id'=>$pizza->id])}}">Supprimer toutes les pizza : {{$pizza->nom}}</a>
                            </label>
                            <input type="submit" value="Mettre a jour valeur de pizza"><br/>
                            @csrf
                        </form>
                        <br/>
                    <span style="visibility: hidden">{{$total += $value* $pizza->prix}}</span>
                @endif
            @endforeach
        @endunless
    </div>
    <div>Total : {{$total}}€</div><br/>
<form method="post" action="#">
    <input type="submit" value="Passé commande">
</form>
</fieldset>

@endsection
