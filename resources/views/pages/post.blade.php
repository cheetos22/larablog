@extends('layouts.master')
@section('title', $post->title)

@section('content')

@if ($post->type === 'text')
<article class="post formatText">
    <div class="postContent">
        <div class="wrapper">
            <h2 class="postTitle">
                <a href="{{ route('posts.single', $post->slug) }}">{{ $post->title }}</a>
            </h2>
            <div class="rte">
                {!! $post->content !!}
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
            <p class="date"><i class="fa fa-clock-o"></i> {{ $post->date->diffForHumans() }}</p>
            <p>
                <a href="{{ route('admin.post.edit', $post->id) }}" class="link"><i class="fa fa-edit"></i> Edytuj</a>
            </p>
        </div>
    </div>
</article>
@elseif ($post->type === 'photo')
<article class="post formatPhoto">
    <figure class="postImage">
        <i class="postPremium fa fa-star"></i>
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
            <p class="date"><i class="fa fa-clock-o"></i> {{ $post->date->diffForHumans() }}</p>
            <p>
                <a href="{{ route('admin.post.edit', $post->id) }}" class="link"><i class="fa fa-edit"></i> Edytuj</a>
            </p>
        </div>
    </div>
</article>
@endif
@endsection
