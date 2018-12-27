@extends('default')

@section('title')
    Mon cher blog
@endsection

@section('content')
    <form action="" class="form-inline">
        <input type="search" class="form-control" name="q" value="{{ request('q') }}">
        <button class="btn btn-danger">Rechercher</button>
        <a href="{{ route('articles.index') }}" class="btn btn-dark">Vider</a>
    </form>
    <h1>Salut</h1>
    @foreach ($articles as $article)
        <article>
            
            <h3> {{ $loop->iteration }}. {!! $article->nameFormated !!}	</h3>
            <p><small>{{ $article->user->name }}</small></p>
            <p>{{ str_limit($article->body, 300) }}</p>
            @if ($article->tags->isNotEmpty())
                <p>tags: {{ $article->tags->pluck('name')->implode(', ') }}</p>
            @endif
           
           
            <a class="btn btn-info" href="{{ route('articles.show', $article) }}">Lire la suite</a>
        </article>

        @if ($loop->first)
            <hr>
        @endif
    @endforeach

    {!! $articles->appends(['q' => request('q')])->links() !!}
    
@endsection