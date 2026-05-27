<!DOCTYPE html>

<html lang="it">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<a href="/" class="home-icon">

    <i class="fa-solid fa-house"></i>

</a>

<section class="auth-page">

    <div class="auth-card">

        <h1>Login</h1>

        @if ($errors->any())

        <div class="error-message" id="error-message">

            <ul>

                <li>Utente non trovato oppure password errata.</li>

            </ul>

        </div>

        @endif

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

            <a href="/register" class="logout-btn">
                Non hai un account? Registrati
            </a>

        </form>

    </div>

</section>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const message = document.getElementById('error-message');

    if (message) {

        setTimeout(function () {

            message.style.opacity = '0';

            setTimeout(function () {

                message.remove();

            }, 500);

        }, 3000);
    }

});

</script>

</body>

</html>