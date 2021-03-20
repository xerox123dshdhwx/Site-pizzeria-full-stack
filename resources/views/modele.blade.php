<style>
    body {
            background-color: #4c3217;
    }


    a{
        color: #bfbf00;
    }
    a:hover{
        color: red;
    }
    .deco{
        color: red;
        font-size: 30px;
        font-family: bold, serif;
    }
</style>
{{-- style de l'animation d'acueille --}}
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }
    body, html {

        width: 100%;
        height: 100%;

    }
    .content{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .content .text{
        position: relative;
        color: #ffffab;
        font-weight: 700;
        font-size: 45px;
        transform: scale(2);

        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .content .text:before,
    .content .text:after {

        color: white;
        content: attr(data-text);
        position: absolute;
        width: 100%;
        height: 100%;


        top: 0;
    }
    .content .text:before{
        left: 3px;
        text-shadow: -2px 0 red;
        animation: glitch-1 2s linear infinite reverse;
    }
    .content .text:after{
        left: -3px;
        text-shadow: -2px 0 red;
        animation: glitch-2 2s linear infinite reverse;
    }
    @keyframes glitch-1 {
        0% {
            clip: rect(132px, auto, 101px, 30px);
        }
        5% {
            clip: rect(17px, auto, 94px, 30px);
        }
        10% {
            clip: rect(40px, auto, 66px, 30px);
        }
        15% {
            clip: rect(87px, auto, 82px, 30px);
        }
        20% {
            clip: rect(137px, auto, 61px, 30px);
        }
        25% {
            clip: rect(34px, auto, 14px, 30px);
        }
        30% {
            clip: rect(133px, auto, 74px, 30px);
        }
        35% {
            clip: rect(76px, auto, 107px, 30px);
        }
        40% {
            clip: rect(59px, auto, 130px, 30px);
        }
        45% {
            clip: rect(29px, auto, 84px, 30px);
        }
        50% {
            clip: rect(22px, auto, 67px, 30px);
        }
        55% {
            clip: rect(67px, auto, 62px, 30px);
        }
        60% {
            clip: rect(10px, auto, 105px, 30px);
        }
        65% {
            clip: rect(78px, auto, 115px, 30px);
        }
        70% {
            clip: rect(105px, auto, 13px, 30px);
        }
        75% {
            clip: rect(15px, auto, 75px, 30px);
        }
        80% {
            clip: rect(66px, auto, 39px, 30px);
        }
        85% {
            clip: rect(133px, auto, 73px, 30px);
        }
        90% {
            clip: rect(36px, auto, 128px, 30px);
        }
        95% {
            clip: rect(68px, auto, 103px, 30px);
        }
        100% {
            clip: rect(14px, auto, 100px, 30px);
        }
    }
    @keyframes glitch-2 {
        0% {
            clip: rect(129px, auto, 36px, 30px);
        }
        5% {
            clip: rect(36px, auto, 4px, 30px);
        }
        10% {
            clip: rect(85px, auto, 66px, 30px);
        }
        15% {
            clip: rect(91px, auto, 91px, 30px);
        }
        20% {
            clip: rect(148px, auto, 138px, 30px);
        }
        25% {
            clip: rect(38px, auto, 122px, 30px);
        }
        30% {
            clip: rect(69px, auto, 54px, 30px);
        }
        35% {
            clip: rect(98px, auto, 71px, 30px);
        }
        40% {
            clip: rect(146px, auto, 34px, 30px);
        }
        45% {
            clip: rect(134px, auto, 43px, 30px);
        }
        50% {
            clip: rect(102px, auto, 80px, 30px);
        }
        55% {
            clip: rect(119px, auto, 44px, 30px);
        }
        60% {
            clip: rect(106px, auto, 99px, 30px);
        }
        65% {
            clip: rect(141px, auto, 74px, 30px);
        }
        70% {
            clip: rect(20px, auto, 78px, 30px);
        }
        75% {
            clip: rect(133px, auto, 79px, 30px);
        }
        80% {
            clip: rect(78px, auto, 52px, 30px);
        }
        85% {
            clip: rect(35px, auto, 39px, 30px);
        }
        90% {
            clip: rect(67px, auto, 70px, 30px);
        }
        95% {
            clip: rect(71px, auto, 103px, 30px);
        }
        100% {
            clip: rect(83px, auto, 40px, 30px);
        }
    }


    .neon{
        position: absolute;
        transform: translate(-50%,-50%);
        color: red;
        text-shadow: 0 0 40px red;
    }
    .neon:after{
        top: 0;
        left: 0;
        z-index: -1;
        color: red;
        filter: blur(15px);
        content: attr(data-text);

    }
    .neon:before{
        content: '';

        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: red;
        z-index: -2;
        opacity: .5;
        filter: blur(40px);

    }
</style>
@guest()
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Enregistrement</a>
    <div  style="margin-left: 10%" class="content">
        <span class="neon"><div class="text" class="neon" data-text="PPIZZERIA"><span style="visibility: hidden">P</span>PIZZERIA</div></span>
    </div>
@endguest
@auth
    <a class="deco" href="{{route('logout')}}">Deconnexion</a>
    <p>Bonjour {{ Auth::user()->nom}} {{ Auth::user()->id }} </p>
    <a href="{{route('editUser',['id'=> Auth::user()->id ])}}">Changer de mots de passe</a></br>
@endauth
@auth
    <a href="{{route('admin')}}">Partie admin</a><br/><br/>
    <a href="{{route('pizza')}}">Voir les pizza</a><br/>
    <a href="{{route('panier_get')}}">Voir Mon panier</a><br/>
@endauth



@section('erros')
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@show
@section('etat')
    @if(session()->has('etat'))
        <p class="etat">{{session()->get('etat')}}</p>
        @endif
@show


@yield('contents')
@yield('admin visu')
