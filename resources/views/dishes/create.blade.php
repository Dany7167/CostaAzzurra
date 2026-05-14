<h1>Aggiungi Piatto</h1>
  @if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('dishes.store') }}" method="POST">
    @csrf

    <div>
        <label>Nome</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Descrizione</label>
        <textarea name="description" required></textarea>
    </div>

    <div>
      
        <label>Prezzo</label>
        <input type="number" step="0.01" name="price" required>
    </div>

    <button type="submit">
        Salva
    </button>
</form>