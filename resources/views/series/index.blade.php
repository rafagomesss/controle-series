<x-layout title="Séries" :message="$message">
    @auth
        <a class="btn btn-sm btn-dark mb-2" href="{{ route('series.create') }}">Adicionar</a>
    @endauth

    <ul class="list-group">
        @if ($series->isEmpty())
            <li class="list-group-item d-flex justify-content-between align-items-center">Nenhuma Série Cadastrada</li>
        @endif
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{ $serie->name }}
                @auth </a> @endauth
                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-sm btn-success">E</a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                X
                            </button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
