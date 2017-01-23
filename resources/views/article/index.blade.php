@extends('layouts.app')

@section('content')

    <jumbotron v-cloak>
        <h3>{{ config('blog.article.title') }}</h3>

        <h6>{{ config('blog.article.description') }}</h6>
    </jumbotron>

    <assassins-creed-promo>
    </assassins-creed-promo>

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection