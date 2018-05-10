@extends('templates.master')
@section('title')
Blog - Laravel
@endsection

@section('content')

<strong>Total Categorias: {{ $categories->total()}} </strong>
<small>Mostrando: {{ $categories->count() }} </small>
<hr>

@if( session('output') )
    <div class="notification {{ session('output')['type'] }}">
        {{-- <button class="delete"></button> --}}
        {{ session('output')['message'] }}
    </div>
@endif

@foreach($categories as $category)
<div class="box">
    <article class="media">

        <div class="media-content">
        <div class="content">
            <strong>{{ strtoupper($category->name) }}</strong> <small style="float: right">Criado em: {{ $category->created_at }}</small></a> <br> 
                        
            <p>{{ $category->description }}</p>

            <hr>

        </div>
        <nav class="level is-mobile">
            <div class="level-left">
                <a href="{{ route('categories.edit', $category->id) }}" class="level-item" aria-label="retweet">
                    <span class="icon is-small">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    </span>
                </a>
                
                <a class="level-item" aria-label="like">
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

{{ $categories->links() }}

<a class="float-buttom open-modal"><i class="fas fa-plus"></i></a>

<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title"> <i class="fas fa-plus"></i> Nova Categoria</p>
        <button class="delete close-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <p>Adicione uma nova categoria:</p>
            {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}

                @include('form.input', ['label' => '', 'name' => 'name', 'placeholder' => 'Nome da categoria'])
                @include('form.input', ['label' => '', 'name' => 'description', 'placeholder' => 'Descrição da categoria'])

            </section>
            <footer class="modal-card-foot">
                
                {!! Form::submit('Adicionar', ['class' => 'button is-success']) !!}
                
                <button class="button close-modal" >Cancelar</button>

            </footer>
            {!! Form::close() !!}
    </div>
</div>

@endsection


