@extends('admin.layouts.app')

@section('title', 'Novo Post')
@section('content')

<h1>Cadastrar novo post</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $erro )
            <ul>
                <li>{{ $erro }}</li>
            </ul>
        @endforeach
    </div>

@endif

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="image">
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ old('title') }}">
    <textarea name="content" id="content" cols="30" rows="10" placeholder="conteudo"> {{old('content')}} </textarea>
    <button type="submit">Enviar</button>

</form>


@endsection
