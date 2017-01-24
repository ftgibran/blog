<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0"/>

    <link rel="shortcut icon" href="{{ config('blog.default_icon') }}">
    
    <meta property="og:url"           content="http://www.clashofnerds/concurso/assassins-creed" />
    <meta property="og:type"          content="website"/>
    <meta property="og:title"         content="Clash Of Nerds - Concurso Assassin's Creed"/>
    <meta property="og:description"   content="Escreva uma frase explicando porque você merece ser ganhador dessa competição até às 23:59 do dia 25/01. A melhor frase será selecionada e o ganhador será contatado na próxima segunda, dia 29/01 para informar o endereço de entrega (entregamos em todo Brasil)" />
    <meta property="og:image"         content="{{ asset('images/Funko-Assassins-Creed.png')}}" />



    <title>Clash Of Nerds - Concurso</title>

    <style>
        nav {
            height: 70px;
            line-height: 70px;
            background-color: #d5b275;
        }

        nav ul a {
            color: #fff;
        }

        body {
            background-color: #f2f2f2;
        }

        .card-panel, nav {
            box-shadow: none;
        }

        .card-panel img {
            width: 100%;
        }

        .color-default {
            background-color: #d5b275 !important;
        }

        input:not([type]):focus:not([readonly])+label, input[type=text]:focus:not([readonly])+label, input[type=password]:focus:not([readonly])+label, input[type=email]:focus:not([readonly])+label, input[type=url]:focus:not([readonly])+label, input[type=time]:focus:not([readonly])+label, input[type=date]:focus:not([readonly])+label, input[type=datetime]:focus:not([readonly])+label, input[type=datetime-local]:focus:not([readonly])+label, input[type=tel]:focus:not([readonly])+label, input[type=number]:focus:not([readonly])+label, input[type=search]:focus:not([readonly])+label, textarea.materialize-textarea:focus:not([readonly])+label {
            color: #d5b275;
        }

        input:not([type]):focus:not([readonly]), input[type=text]:focus:not([readonly]), input[type=password]:focus:not([readonly]), input[type=email]:focus:not([readonly]), input[type=url]:focus:not([readonly]), input[type=time]:focus:not([readonly]), input[type=date]:focus:not([readonly]), input[type=datetime]:focus:not([readonly]), input[type=datetime-local]:focus:not([readonly]), input[type=tel]:focus:not([readonly]), input[type=number]:focus:not([readonly]), input[type=search]:focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #d5b275;
            box-shadow: 0 1px 0 0 #d5b275;
        }

        .dropdown-content li > a, .dropdown-content li > span {
            color: #d5b275;
        }

    </style>

</head>



<body>


<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo" style="margin-left: 10px">
            <img src="{{ asset('images/logo.png') }}" alt="Clash Of Nerds" style="width: 240px">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/">BLOG</a></li>
        </ul>
    </div>
</nav>

<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <div class="row">

                <div class="col m6 s12">
                    <img src="{{ asset('images/Funko-Assassins-Creed.png') }}   " alt="">
                </div>


                <div class="col m6 s12">

                    {{ Form::open(['url' => 'concurso/cadastrar']) }}
                    <input type="hidden" name="tipo" value="1">
                    <div class="row">
                        <h4 style="color: #d5b275">Envie a sua frase e concorra a um Funko Pop do Assassin's Creed!</h4>
                        <h6 style="color: #898989">Escreva uma frase explicando <b>porque você merece ser ganhador dessa competição</b> até às 23:59 do dia 25/01. A melhor frase será selecionada e o ganhador será contatado na próxima segunda, dia 29/01 para informar o endereço de entrega <span style="font-size: 10px">(entregamos em todo Brasil)</span></h6>
                        <div class="input-field col s12">
                            <input id="nome" name="nome" type="text" class="validate" required>
                            <label for="email">Nome Completo *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate" required>
                            <label for="email">E-mail *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" name="frase" class="materialize-textarea" required maxlength="140"></textarea>
                            <label for="textarea1">Porque você merece ser ganhador dessa competição * (140 caracteres)</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="waves-effect waves-light btn color-default">Participar</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="application/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

@if(config('blog.google.open'))
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
@endif
</body>
</html>
