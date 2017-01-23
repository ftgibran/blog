@extends('layouts.app')

@section('content')

    <jumbotron v-cloak>
        <h3>{{ config('blog.article.title') }}</h3>

        <h6>{{ config('blog.article.description') }}</h6>
    </jumbotron>

    <div class="text-center">
        <a href="/concurso/darth-vader">
            <img src="/images/ads/banner_sw.gif" alt="">
        </a>
    </div>

    @if(rand(0,1) == 0)
        <assassins-creed-promo></assassins-creed-promo>
    @else
        <darth-vader-promo></darth-vader-promo>
    @endif

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection