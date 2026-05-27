@include('layouts.navbar')

 @if ($errors->any())

    <div class="error-message"
         id="error-message">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
<!--
@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif
-->
@if(session('success'))

   <div class="success-message"
        id="success-message">

        {{ session('success') }}

    </div>

@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prenota un tavolo</title>

</head>
<section class="reservation-page">

    <div class="reservation-card">

        <h1>Prenota un tavolo</h1>

        <form method="POST" action="{{ route('reservations.store') }}">

            @csrf

            <!-- Nome -->
            <input type="text"
                   name="name"
                   placeholder="Nome">

            <!-- Email -->
            <input type="email"
                   name="email"
                   placeholder="Email">

            <!-- Data -->
            <input type="date"
                   name="date">

            <!-- Orario -->
            <select name="time">

                <option value="">Seleziona orario</option>

                <optgroup label="🍝 Pranzo">
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                </optgroup>

                <optgroup label="🍽 Cena">
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                </optgroup>

            </select>

            <!-- Persone -->
            <input type="number"
                   name="guests"
                   placeholder="Numero persone">

            <!-- Note -->
            <textarea name="notes"
                      placeholder="Eventuali note"></textarea>

            <button type="submit">
                Prenota
            </button>

        </form>

    </div>

</section>

<script>

    setTimeout(() => {

        const message = document.getElementById('error-message');

        if(message) {

            message.style.opacity = '0';

            setTimeout(() => {
                message.remove();
            }, 500);
        }

    }, 3000);

</script>

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