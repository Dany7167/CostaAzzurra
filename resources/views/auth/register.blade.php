<!DOCTYPE html>

<html lang="it">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrati</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<a href="/" class="home-icon">

    <i class="fa-solid fa-house"></i>

</a>

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

            <a href="/login" class="logout-btn">
                Hai un account? Login
            </a>

        </form>

    </div>

</section>

</body>

</html>