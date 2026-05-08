<h1>Menu Ristorante</h1>

@foreach($dishes as $dish)
    <div style="margin-bottom:20px;">
        <h2>{{ $dish->name }}</h2>

        <p>{{ $dish->description }}</p>

        <strong>{{ $dish->price }} €</strong>
    </div>
@endforeach