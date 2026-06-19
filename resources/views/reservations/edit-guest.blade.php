@include('layouts.navbar')

<section class="reservation-page">

    <div class="reservation-card">

        <h1>Modifica prenotazione</h1>

        <form method="POST"
              action="{{ route('reservations.update.mine', $reservation->id) }}">

            @csrf
            @method('PUT')

            <input type="date"
                   name="date"
                   value="{{ $reservation->date }}"
                   required>

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

            <input type="number"
                   name="guests"
                   value="{{ $reservation->guests }}"
                   min="1"
                   max="15"
                   required>

            <textarea name="notes">{{ $reservation->notes }}</textarea>

            <button type="submit">
                Salva modifiche
            </button>

        </form>

    </div>

</section>