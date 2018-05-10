@extends('templates.master')
@section('title')
Blog - Laravel
@endsection

@section('content')

<div class="tile">
    <article class="tile is-child">
        <div class="content">
        <p class="title">{{$post->title}} </p> 
        <p class="subtitle">{{$post->subtitle}} <small style="font-size: 0.8em; color: #999; float: right">Criado em: {{ $post->mask_created_at}}</small></p>
        <hr>
        <div class="content">
            {!! html_entity_decode($post->description) !!}
        </div>
        </div>
    </article>
</div>

@endsection


