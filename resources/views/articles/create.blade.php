<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">

        <main class="mt-6 container mb-6">
            <div class="row mt-5 ">
                        <div class="grid">

                            <div class="row mt-5 ">
                                <div class="col-lg-11">
                                    <h2>Ajouter un contact</h2>
                                </div>
                                <div class="col-lg-1">
                                    <a  href="/" class="btn btn-outline-primary px-4">Retour</a>
                                </div>
                            </div>

                            @if ($errors->any())

                                <div class="alert alert-danger">

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            @endif

                            <form action="{{ url('article/store') }}" class="max-w-lg mx-auto" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="nom">Nom :</label>
                                    <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                                </div>

                                <div class="form-group mb-3">

                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" id="description" placeholder="description" name="description">

                                </div>


                                <div class="form-group mb-3">
                                    <label for="image">image:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                               


                                <button type="submit" class="btn btn-primary">Enregister</button>

                            </form>

                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
