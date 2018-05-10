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

{{ Form::model($post, ['route' => ['posts.update', $post->id ], 'method' => 'put']) }}
@include('form.input', ['name' => 'title', 'label' => 'Título', 'placeholder' => 'Título do Post'])
@include('form.input', ['name' => 'subtitle', 'label' => 'Subtitulo', 'placeholder' => 'Subtitulo do Post'])
@include('form.select', ['name' => 'categories_id', 'label' => 'Categorias', 'option' => $categories ])
@include('form.textarea', ['name' => 'description', 'label' => 'Descrição', 'placeholder' => 'Escreva aqui'])
@include('form.checkbox', ['name' => 'draft', 'label' => 'Salvar como rascunho'])
@include('form.submit')
{{ Form::close() }}


@endsection

@section('scripts')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection



