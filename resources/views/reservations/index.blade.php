<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Prenotazioni</title>
</head>

@include('layouts.navbar')

 @if(session('success'))

        <div class="success-message" id="success-message">

            {{ session('success') }}

        </div>

    @endif

<section class="reservations-admin-page">

    <h1>Prenotazioni</h1>

    <div class="reservations-container">

        @foreach($reservations as $reservation)

            <div class="reservation-admin-card">

                <div class="reservation-top">

                    <h2>{{ $reservation->name }}</h2>

                    <span>
                        {{ $reservation->date }} • {{ $reservation->time }}
                    </span>

                </div>

                <div class="reservation-info">

                    <p><strong>Email:</strong> {{ $reservation->email }}</p>

                    <p><strong>Persone:</strong> {{ $reservation->guests }}</p>

                    @if($reservation->notes)

                        <p>
                            <strong>Note:</strong>
                            {{ $reservation->notes }}
                        </p>

                    @endif

                </div>

                <div class="reservation-actions">

                    <form action="{{ route('reservations.destroy', $reservation->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="dish-icon delete-btn"
                                onclick="return confirm('Eliminare prenotazione?')">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

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