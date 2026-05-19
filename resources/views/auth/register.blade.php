<!--TODO: bottone casetta in alto a sinistra che se cliccato reindirizza alla home-->
@include('layouts.navbar')

<section class="auth-page">

    <div class="auth-card">

        <h1>Registrati</h1>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <input type="text"
                   name="name"
                   placeholder="Nome"
                   required>

            <input type="email"
                   name="email"
                   placeholder="Email"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <input type="password"
                   name="password_confirmation"
                   placeholder="Conferma Password"
                   required>

            <button type="submit">
                Registrati
            </button>
            
        </form>
    </div>
</section>