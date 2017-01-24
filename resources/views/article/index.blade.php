@extends('layouts.app')

@section('content')

    <jumbotron v-cloak>

        <img src="/images/logo.png" class="responsive-img" alt="Clash Of Nerds"
             style="position:relative; top: -28px; width: 500px">

        <h6>{{ config('blog.article.description') }}</h6>

    </jumbotron>

    <div class="text-center">
        @if(rand(0,1) == 0)
            <a href="/concurso/assassins-creed">
                <img src="/images/ads/banner_ac.gif" alt="Assassin Creed">
            </a>
        @else
            <a href="/concurso/darth-vader">
                <img src="/images/ads/banner_sw.gif" alt="Darth Vader">
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