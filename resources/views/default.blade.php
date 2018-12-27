@inject('article', 'App\Article')

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                @yield('content')
            </div>
            <div class="col-sm-4">
                <h4>Les derniers article</h4>
                
                @php
                    $articles = $article->latestArticles()->get()
                @endphp

                @forelse ($articles as $article)
                    <li><a href="{{ route('articles.show', $article) }}">{{ $article->name }} </a>{{ $article->publication_since}}</li>
                @empty
                    <p>Aucun article</p>
                @endforelse

                
            </div>
        </div>
    </div>
</body>
</html>