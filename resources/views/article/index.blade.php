@extends('layouts.app')

@section('content')

    <jumbotron v-cloak>

        <h3>O blog feito por gamers, para gamers!</h3>
        <h5>Aproveite a nossa campanha de lançamento e concorra à prêmios!</h5>

        @if(rand(0,1) == 0)
            <a href="/concurso/assassins-creed" class="waves-effect waves-light btn color-default">PARTICIPAR</a>
        @else
            <a href="/concurso/darth-vader" class="waves-effect waves-light btn color-default">PARTICIPAR</a>
        @endif

        <h6>{{ config('blog.article.description') }}</h6>

    </jumbotron>

    <div class="text-center">
        @if(rand(0,1) == 0)
            <a href="/concurso/assassins-creed">
                <img src="/images/ads/banner_ac.gif" alt="Assassin Creed" class="banner_ads">
            </a>
        @else
            <a href="/concurso/darth-vader">
                <img src="/images/ads/banner_sw.gif" alt="Darth Vader" class="banner_ads">
            </a>
        @endif
    </div>

    @if(rand(0,1) == 0)
        <assassins-creed-promo></assassins-creed-promo>
    @else
        <darth-vader-promo></darth-vader-promo>
    @endif

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection