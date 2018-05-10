@extends('templates.master')
@section('title')
Blog - Laravel
@endsection

@section('content')
@if( session('output') )
    <div class="notification {{ session('output')['type'] }}">
        {{-- <button class="delete"></button> --}}
        {{ session('output')['message'] }}
    </div>
@endif
@foreach($posts as $post)
<div class="box">
    <article class="media">
        <div class="media-left">
        <figure class="image is-64x64">
            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
        </figure>
        </div>
        <div class="media-content">
        <div class="content">
            <a href="{{ route('posts.show', $post->id) }}"><strong>{{ $post->title }}</strong></a> <br>
            <small><i class="far fa-tag"></i>    Criado em: {{ $post->mask_created_at }}</small> 
            
            <p>
            
            <hr>
            
            {{  substr(strip_tags($post->description), 0, 100 ) . ' [...]' }}
            {{-- {!! html_entity_decode($post->description) !!} --}}

            </p>
        </div>
        <nav class="level is-mobile">
            <div class="level-left">

            <a href="{{ route('posts.edit', $post->id) }}" class="level-item" aria-label="retweet">
                <span class="icon is-small">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </span>
            </a>
            <a href="{{ route('favorites.store', ['user_id' => 1, 'post_id' => $post->id]) }}" class="level-item" aria-label="like">
                <span class="icon is-small">
                <i class="far fa-heart" aria-hidden="true" title="Adicionar aos favoritos"></i>
                </span>
            </a>
            <a class="level-item delete-post" aria-label="like">
                <span class="icon is-small">
                <i class="fas fa-trash" aria-hidden="true"></i>
                </span>
            </a>
            </div>
        </nav>
        </div>
    </article>
</div>
@endforeach

<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">Confirme essa operação</p>
        <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <strong>Tem certeza que deseja mover para excluir permanentemente essa postagem?</strong>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success">Excuir</button>
            <button class="button close-modal" >Cancelar</button>
        </footer>
    </div>
</div>

@endsection


