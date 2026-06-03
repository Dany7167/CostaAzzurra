<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aggiungi piatto</title>

</head>

  @if ($errors->any())
    <div style="color:red; margin-bottom:15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@include('layouts.navbar')

<section class="dish-create-page">

    <div class="dish-create-card">

        <h1>Nuovo Piatto</h1>

        <form action="{{ route('dishes.store') }}"
              method="POST">

            @csrf

            <input type="text"
                   name="name"
                   placeholder="Nome piatto"
                   required>

            <textarea name="description"
                      placeholder="Descrizione"
                      required></textarea>

            <input type="number"
                   step="0.01"
                   name="price"
                   placeholder="Prezzo"
                   required>

            <select name="category" required>

                <option value="">Seleziona categoria</option>

                <option value="Antipasti">Antipasti</option>

                <option value="Primi">Primi</option>

                <option value="Secondi">Secondi</option>

                <option value="Formaggi">Formaggi</option>

                <option value="Pizze">Pizze</option>

                <option value="Contorni">Contorni</option>

                <option value="Bevande">Bevande</option>

                <option value="Dolci">Dolci</option>

            </select>

            <button type="submit">
                Aggiungi piatto
            </button>

        </form>

    </div>

</section>