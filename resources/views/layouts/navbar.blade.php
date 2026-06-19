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
        <a href="/dishes">Menù</a>
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

        @role('admin')
        <a href="/reservations" class="btn-prenota">
            Prenotazioni
        </a>
        @endrole

        @unlessrole('admin')
        <a href="/reservations/create" class="btn-prenota">
            Prenota
        </a>
        @endunlessrole

        @auth

    @unlessrole('admin')

        <a href="{{ route('reservations.mine') }}">
            Le mie prenotazioni
        </a>

    @endunlessrole

        @endauth
        
        <a>
             Tel: +39 030 268 0614
        </a>

        @auth
        <div class="user-status">

            <span>
               <a>{{ Auth::user()->name }}</a>
            </span>

            <i class="fa-solid fa-circle-user"></i>
        </div>
        @endauth

    </div>
</nav>