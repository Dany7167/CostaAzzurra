@include('layouts.navbar')

@if(session('success'))
    <div class="success-message" id="success-message">
        {{ session('success') }}
    </div>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menù</title>
</head>

<section class="menu-page">

    @role('admin')
        <a href="{{ route('dishes.create') }}" class="admin-add-link">
            + Aggiungi piatto
        </a>
    @endrole

    <h1>Il Nostro Menu</h1>

    @php
        $categories = ['Antipasti','Primi','Secondi','Formaggi','Pizze','Contorni','Bevande','Dolci'];
    @endphp

    <div class="menu-layout">

        {{-- COLONNA SINISTRA: categorie --}}
        <aside class="menu-sidebar">
            <button class="menu-btn active" onclick="showCategory('Tutti', this)">Tutti</button>
            @foreach($categories as $category)
                <button class="menu-btn" onclick="showCategory('{{ $category }}', this)">
                    {{ $category }}
                </button>
            @endforeach
        </aside>

        {{-- COLONNA DESTRA: piatti --}}
        <div class="menu-content">
            @foreach($dishes as $dish)
                <div class="dish-item" data-category="{{ $dish->category }}">

                    @if($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}"
                             alt="{{ $dish->name }}"
                             class="dish-image">
                    @endif

                    <div class="dish-info">
                        <h3>{{ $dish->name }}</h3>
                        <p>{{ $dish->description }}</p>
                    </div>

                    <div class="dish-actions">
                        <span class="dish-price">€ {{ number_format($dish->price, 2, ',', '.') }}</span>

                        @role('admin')
                            <a href="{{ route('dishes.edit', $dish->id) }}" class="dish-icon">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dish-icon delete-btn"
                                        onclick="return confirm('Sei sicuro di voler eliminare questo piatto?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endrole
                    </div>
                </div>
            @endforeach

            @if($dishes->isEmpty())
                <div class="empty-category">
                    <p>Al momento non sono presenti piatti nel menù.</p>
                </div>
            @endif
        </div>

    </div>
</section>

<script>
    function showCategory(category, btn) {
        // evidenzia il bottone attivo
        document.querySelectorAll('.menu-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // mostra/nascondi i piatti
        document.querySelectorAll('.dish-item').forEach(item => {
            if (category === 'Tutti' || item.dataset.category === category) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    setTimeout(() => {
        const message = document.getElementById('success-message');
        if (message) {
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500);
        }
    }, 3000);
</script>