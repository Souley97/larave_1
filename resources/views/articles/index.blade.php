<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD Blog</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Gestion Articles</h1>
    <a href="{{ route('article.create') }}" class="btn btn-success mb-3">Create Article</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($article->image)
                        <img src="{{ asset('images/'.$article->image) }}" class="card-img-top" alt="Image">
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image Placeholder">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->nom }}</h5>
                        <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('article/' . $article->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ url('article/' . $article->id . '/edit') }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ url('article/' . $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Inclure les fichiers JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
