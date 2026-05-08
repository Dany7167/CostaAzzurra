<h1>Modifica Piatto</h1>

<form action="{{ route('dishes.update', $dish->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>Nome</label>
        <input type="text" name="name" value="{{ $dish->name }}">
    </div>

    <div>
        <label>Descrizione</label>
        <textarea name="description">{{ $dish->description }}</textarea>
    </div>

    <div>
        <label>Prezzo</label>
        <input type="number" step="0.01" name="price" value="{{ $dish->price }}">
    </div>

    <button type="submit">
        Salva modifiche
    </button>

</form>