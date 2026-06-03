@include('layouts.navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifica piatto</title>
</head>
<section class="dish-create-page">

    <div class="dish-create-card">

        <h1>Modifica Piatto</h1>

        <form action="{{ route('dishes.update', $dish->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <input type="text"
                   name="name"
                   value="{{ $dish->name }}"
                   placeholder="Nome piatto"
                   required>

            <textarea name="description"
                      placeholder="Descrizione"
                      required>{{ $dish->description }}</textarea>

            <input type="number"
                   step="0.01"
                   name="price"
                   value="{{ $dish->price }}"
                   placeholder="Prezzo"
                   required>

            <select name="category" required>

                <option value="Antipasti" {{ $dish->category == 'Antipasti' ? 'selected' : '' }}>
                    Antipasti
                </option>

                <option value="Primi" {{ $dish->category == 'Primi' ? 'selected' : '' }}>
                    Primi
                </option>

                <option value="Secondi" {{ $dish->category == 'Secondi' ? 'selected' : '' }}>
                    Secondi
                </option>

                <option value="Formaggi" {{ $dish->category == 'Formaggi' ? 'selected' : '' }}>
                    Formaggi
                </option>

                <option value="Pizze" {{ $dish->category == 'Pizze' ? 'selected' : '' }}>
                    Pizze
                </option>

                <option value="Contorni" {{ $dish->category == 'Contorni' ? 'selected' : '' }}>
                    Contorni
                </option>

                <option value="Bevande" {{ $dish->category == 'Bevande' ? 'selected' : '' }}>
                    Bevande
                </option>

                <option value="Dolci" {{ $dish->category == 'Dolci' ? 'selected' : '' }}>
                    Dolci
                </option>

            </select>

            <button type="submit">
                Salva modifiche
            </button>

        </form>

    </div>

</section>