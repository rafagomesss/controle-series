<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/css/app.scss'])
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>
                @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-warning px-4">Sair</button>
                    </form>
                    @endauth
                @guest
                    <a href="{{ route('login') }}">Entrar</a>
                @endguest
            </div>
        </nav>
        <div class="container">
            <h1>{{ $title }}</h1>

            @isset($message)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! $message !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endisset

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="list-group list-group-numbered">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{ $slot }}

        </div>
    </main>
    @vite(['resources/js/app.js'])
</body>

</html>
