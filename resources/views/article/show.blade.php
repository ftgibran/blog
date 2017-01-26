@extends('layouts.app')

@section('content')

    <register></register>

    @if(rand(0,1) == 0)
        <assassins-creed-promo></assassins-creed-promo>
    @else
        <darth-vader-promo></darth-vader-promo>
    @endif

    <jumbotron v-cloak>
        <h4>{{ $article->title }}</h4>

        <h6>{{ $article->subtitle }}</h6>

        <div class="header">
            <i class="ion-person"></i>{{ $article->user->name or 'null' }}，
            @if(count($article->tags))
            <i class="ion-pricetag"></i>
                @foreach($article->tags as $tag)
                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a>，
                @endforeach
            @endif
            <i class="ion-clock"></i>{{ $article->published_at->diffForHumans() }}
        </div>
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

    <div class="article container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            <parse :content="{{ $article->content }}"></parse>

            @if($article->is_original)
                <div class="publishing alert alert-dismissible alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! config('blog.license') !!}
                </div>
                @endif
                @if(config('blog.social_share.article_share'))
                <div class="footing">
                    <div class="social-share"
                        data-title="{{ $article->title }}"
                        data-description="{{ $article->title }}"
                        {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }}
                        {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }}
                        initialized></div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @if(Auth::guest())
        <comment title="Comments"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"
                 guest-comment></comment>
    @else
        <comment title="Comments"
                 username="{{ Auth::user()->name }}"
                 user-avatar="{{ Auth::user()->avatar }}"
                 commentable-type="articles"
                 commentable-id="{{ $article->id }}"
                 can-comment></comment>
    @endif

@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
