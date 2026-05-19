<!--TODO: bottone casetta in alto a sinistra che se cliccato reindirizza alla home-->
@include('layouts.navbar')

<section class="auth-page">

    <div class="auth-card">

        <h1>Login</h1>

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <input type="email"
                   name="email"
                   placeholder="Email"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   required>

            <button type="submit">
                Accedi
            </button>
        </form>
    </div>
</section>