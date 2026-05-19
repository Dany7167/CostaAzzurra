<link rel="stylesheet" href="/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap" rel="stylesheet">

<nav class="navbar">

    <div>
        <a href="/" class="logo">
            La Costa Azzurra
        </a>
    </div>

    <div class="nav-links">

        <a href="/">Home</a>

        <a href="/dishes">Menu</a>

    </div>

    <div class="nav-right">

        <a href="https://instagram.com/la_costa_azzurra_castelmella_/" target="_blank">
            <i class="fa-brands fa-instagram"></i>
        </a>

        @guest
            <a href="/login">Login</a>

            <a href="/register">Registrati</a>
        @endguest

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="logout-btn">
                    Log-out
                </button>
            </form>
        @endauth

        <a href="/reservations/create" class="btn-prenota">
            Prenota
        </a>
    </div>
</nav>