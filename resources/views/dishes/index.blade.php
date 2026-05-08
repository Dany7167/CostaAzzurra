<h1>Menu Ristorante</h1>
@if(session('success'))
    <p style="color: green; font-weight: bold;">
        {{ session('success') }}
    </p>
@endif

@foreach($dishes as $dish)
    <div style="margin-bottom:20px;">
        <h2>{{ $dish->name }}</h2>

        <p>{{ $dish->description }}</p>

        <strong>{{ $dish->price }} €</strong>

        @role('admin')

        <a href="{{ route('dishes.edit', $dish->id) }}">Modifica</a>
            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button 
                    type="submit"
                    onclick="return confirm('Sei sicuro di voler eliminare questo piatto?')">
                    
                    Elimina
                </button>
            </form>
        @endrole

    </div>
@endforeach