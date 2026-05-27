@include('layouts.navbar')
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Costa Azzurra</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <section class="hero">

    <div class="hero-overlay">

        <h1>La Costa Azzurra</h1>

        <p>
            Sapori mediterranei nel cuore della città
        </p>

        <div class="hero-buttons">

            <a href="/dishes" class="btn-menu">
                Scopri il Menu
            </a>

            <a href="/reservations/create" class="btn-book">
                Prenota un tavolo
            </a>

        </div>

    </div>

    </section>

<section class="info-section">

    <!-- Left Side -->
    <div class="info-text">

        <h2>Dove siamo</h2>

        <p>
            Via Quinzano 27<br>
            25030 Castel Mella (BS)<br>
            Per prenotare, clicca in alto il tasto<br>
            oppure<br>
            chiamare al: +39 030 268 0614
        </p>

        <a href="https://instagram.com/la_costa_azzurra_castelmella_/"
           target="_blank"
           class="instagram-link">

            <i class="fa-brands fa-instagram"></i>

            Seguici su Instagram
    </a>

    </div>

    <!-- Right Side -->
    <div class="map-container">

        <iframe
            src="https://www.google.com/maps?q=Via+Quinzano+27+Castel+Mella+BS&output=embed"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>

    </div>

</section>
</body>
</html>