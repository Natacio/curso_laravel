@extends('admin.layouts.app')

@section('title', 'Editar Post')

@section('content')

<h1>Editar  post: <strong>{{ $post->title }}</strong></h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $erro )
            <ul>
                <li>{{ $erro }}</li>
            </ul>
        @endforeach
    </div>

@endif

<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" name="image" id="image">
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $post->title  }}">
    <textarea name="content" id="content" cols="30" rows="10" placeholder="conteudo"> {{ $post->content  }} </textarea>
    <button type="submit">Salvar</button>

</form>


@endsection
