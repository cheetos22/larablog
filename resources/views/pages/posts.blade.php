@extends('layouts.master')
@section('title', 'Posty')

@section('content')
@if ($posts->count() > 0)
@foreach ($posts as $post)
@if ($post->type === 'text')
<article class="post formatText">
    <div class="postContent">
        <div class="wrapper">
            @if ($post->premium)
            <i class="postPremium fa fa-star"></i>
            @endif
            <h2 class="postTitle">
                <a href="{{ route('posts.single', $post->slug) }}">{{ $post->title }}</a>
            </h2>
            <div class="rte">
                {!! $post->excerpt !!}
                <p class="readMore">
                    <a href="#">Keep reading</a>
                </p>
            </div>
        </div>
    </div>
    <div class="meta">
        <ul class="tags">
            <li><i class="fa fa-tags"></i></li>
            <li>
                <a href="#">format</a>
            </li>
            <li>
                <a href="#">typography</a>
            </li>
        </ul>
        <div class="flex flex-sb">
            <p class="date"><i class="fa fa-clock-o"></i> {{ $post->date->diffForHumans() }} <i class="fa fa-user"></i> by {{ $post->author->name }}</p>
            @can('manage-posts')
            <p>
                <a href="{{ route('admin.post.edit', $post->id) }}" class="link"><i class="fa fa-edit"></i> Edytuj</a>
            </p>
            @endcan
        </div>
    </div>
</article>
@elseif ($post->type === 'photo')
<article class="post formatPhoto">
    <figure class="postImage">
        @if ($post->premium)
        <i class="postPremium fa fa-star"></i>
        @endif
        <a href="{{ route('posts.single', $post->slug) }}">
        <img src="{{ $post->photo }}" alt="" class="mainPhoto">
        </a>
        <div class="cover"
            style="background: url({{ $post->photo }}) no-repeat;">
        </div>
    </figure>
    <div class="meta">
        <ul class="tags">
            <li><i class="fa fa-tags"></i></li>
            <li>
                <a href="#">photo</a>
            </li>
            <li>
                <a href="#">dog</a>
            </li>
        </ul>
        <div class="flex flex-sb">
            <p class="date"><i class="fa fa-clock-o"></i> {{ $post->date->diffForHumans() }} <i class="fa fa-user"></i> by {{ $post->author->name }}</p>
            @can('manage-posts')
            <p>
                <a href="{{ route('admin.post.edit', $post->id) }}" class="link"><i class="fa fa-edit"></i> Edytuj</a>
            </p>
            @endcan
        </div>
    </div>
</article>
@endif
@endforeach

@include('partials.pagination', ['pagination' => $posts])

@else
    <div class="wrapper">
        <p>Nie dodano jeszcze żadnych wpisów</p>
    </div>
@endif
@endsection
