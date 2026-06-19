@include('layouts.navbar')

@if(session('success'))

    <div class="success-message" id="success-message">

        {{ session('success') }}

    </div>

@endif

<section class="menu-page">

    <h1>Le mie prenotazioni</h1>

    @if($reservations->isEmpty())

        <div class="menu-category-content">

            <p>Non hai ancora effettuato prenotazioni.</p>

        </div>

    @else

        <div style="display:block;"
        class="menu-category-content">

            @foreach($reservations as $reservation)

                <div class="dish-item">

                    <div class="dish-info">

                        <h3>{{ $reservation->date }}</h3>

                        <p>
                            Nome: {{ $reservation->name}} <br>
                            Ore {{ $reservation->time }}
                            • {{ $reservation->guests }} persone <br>
                            Eventuali note: {{$reservation->notes}}
                        </p>

                        <div class="dish-actions">

    <a href="{{ route('reservations.edit.mine', $reservation->id) }}"
       class="dish-icon">

        <i class="fa-solid fa-pen"></i>

    </a>

    <form
        action="{{ route('reservations.destroy.mine', $reservation->id) }}"
        method="POST">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="dish-icon delete-btn"
                onclick="return confirm('Vuoi eliminare questa prenotazione?')">

            <i class="fa-solid fa-trash"></i>

        </button>

    </form>

</div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</section>

<script>

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