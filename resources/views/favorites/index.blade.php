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
@else
    <div class="notification">
        Lista de Favoritos <i class="fas fa-heart"></i>
    </div>
@endif

@foreach($favorites as $favorite)
<div class="box">
    <article class="media">

        <div class="media-content">
            <div class="content">
                <strong>{{ $favorite->posts->title }}</strong> <small style="float: right">Criado em: {{ date('d/m/Y H:i', strtotime($favorite->posts->created_at)) }} </small></a> <br> 
                            
                <p>{{ $favorite->posts->subtitle }}</p>

                <hr>

            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    
                    {!! Form::open(['route' => ['favorites.destroy', $favorite->id], 'method' => 'DELETE' ]) !!}
                        {!! Form::button('<span class="icon is-small"><i class="fas fa-trash" aria-hidden="true"></i></span>', ['type' => 'submit', 'class' => 'level-item']) !!}
                    {!! Form::close() !!}

                </div>
            </nav>
        </div>
    </article>
</div>
@endforeach

{{-- {{ $categories->links() }} --}}

@endsection


