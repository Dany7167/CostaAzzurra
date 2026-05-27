@include('layouts.navbar')

@if(session('success'))

   <div class="success-message"
        id="success-message">

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

    <a href="{{ route('dishes.create') }}"
       class="admin-add-link">
        + Aggiungi piatto
    </a>

    @endrole

    <h1>Il Nostro Menu</h1>

    @php
        $categories = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Formaggi',
            'Pizze',
            'Contorni',
            'Bevande',
            'Dolci'
        ];
    @endphp

    <!-- BUTTON CATEGORIES -->

    <div class="menu-buttons">

        @foreach($categories as $category)

            <button class="menu-btn"
                    onclick="showCategory('{{ $category }}')">

                {{ $category }}

            </button>

        @endforeach

    </div>

    <!-- MENU CONTENT -->

    @foreach($categories as $category)

        <div class="menu-category-content"
             id="{{ $category }}">

            @foreach($dishes->where('category', $category) as $dish)

                <div class="dish-item">

    <!-- LEFT -->

    <div class="dish-info">

        <h3>{{ $dish->name }}</h3>

        <p>{{ $dish->description }}</p>

    </div>

    <!-- RIGHT -->

    <div class="dish-actions">

        <span class="dish-price">

            € {{ $dish->price }}

        </span>

        @role('admin')

            <a href="{{ route('dishes.edit', $dish->id) }}"
               class="dish-icon">

                <i class="fa-solid fa-pen"></i>

            </a>

            <form action="{{ route('dishes.destroy', $dish->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="dish-icon delete-btn"
                        onclick="return confirm('Sei sicuro di voler eliminare questo piatto?')">

                    <i class="fa-solid fa-trash"></i>

                </button>

            </form>

        @endrole

    </div>

</div>

            @endforeach

        </div>

    @endforeach

</section>

<script>

    function showCategory(category) {

        let sections = document.querySelectorAll('.menu-category-content');

        sections.forEach(section => {
            section.style.display = 'none';
        });

        document.getElementById(category).style.display = 'block';
    }

    setTimeout(() => {

        const message = document.getElementById('success-message');

        if(message) {

            message.style.opacity = '0';

            setTimeout(() => {
                message.remove();
            }, 500);
        }

    }, 3000);

</script>
