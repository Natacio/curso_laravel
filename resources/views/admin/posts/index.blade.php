@extends('admin.layouts.app')

@section('title', 'Listagem dos Posts')


@section('content')

<a href="{{ route('posts.create') }}">Criar novo Post</a>
<hr>
@if (session('message'))
    <div>
        {{ session('message') }}
    </div>

@endif
<form action=" {{ route('posts.search') }} " method="post">
    @csrf
    <input  class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"exit
     type="text" name="search" id="search" placeholder="Pesquisar">
    <button type="submit">Buscar</button>
</form>

<h1>Posts</h1>
<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Imagem
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nome
            </th>
        </th>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
                @foreach ($posts as $post )

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $post->id }}</div>
                </td>
                <td>
                    <img class="h-10 w-10 rounded-full" src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width:100px;">
                </td>

                <td>
                    <div class="ml-4">
                    <div class="text-sm text-gray-900">{{ $post->title }}</div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('posts.show', $post->id ) }}">Ver</a>
                </td>
                <td  class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium" >
                    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('posts.edit', $post->id ) }}">Editar</a>
                </td>
        </tr>
                @endforeach
            </tbody>
        </table>


<hr>

@if(isset($filters))

    {{ $posts->appends($filters)->links() }}

@else
    {{$posts->links()}}
@endif


@endsection
