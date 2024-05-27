<!-- resources/views/posts/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD Blog</title>
</head>
<body>
    <h1>Posts</h1>
    <a href="{{ route('article.create') }}">Create Article</a>
    @if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
    <table>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th>Highlighted</th>
            <th>Actions</th>
        </tr>
        @foreach ($articles as $post)
            <tr>
                <td>{{ $post->nom }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    @if($post->image)
                        <img src="{{ asset('images/'.$post->image) }}" width="100" height="100">
                    @endif
                </td>
                <td>{{ $post->highlighted ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}">Show</a>
               
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
