<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HéraultEvents</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <span class="logo">
            <h1>Hérault events</h1>
        </span>
        <div class="menu">
            <i class="fas fa-bars"></i>
        </div>
        <nav class="mobile-display-none">
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Sign Up</a></li>
        </nav>
    </header>

    <main>
        <section class="first-page">
            <div class="title-page">
                <h1>Hérault events</h1>
                <p>
                    Trouver un événement prés de chez vous.
                </p>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="form">
                <form action="" class="find-form">
                    <label for="find">Rechercher un événement</label>
                    <div class="find">
                        <input type="text" name="find" id="find" />
                        <button type="submit" class="btn btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <form action="" class="sign-up">
                    <div class="pseudo">
                        <label for="pseudo">Nom d'utilisateur</label>
                        <input type="text" name="pseudo" id="pseudo">
                    </div>
                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="password">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
            </div>
        </section>

        <section class="events-page" id="events-page">
            <div class="events-title">
                <h1>Trouver votre plaisir :</h1>
                <p>
                    Nous proposant plus de <b>(inserer un nombre énorme ici)</b> événements. c'est pour dire que vous trouverez sûrement votre bonheur:
                </p>
            </div>
            <div class="events">
                <div class="events-card">
                    <h2>Title event</h2>
                    <img src="img/background-1.jpg" alt="évenement" />
                    <p><i class="fas fa-map-marker-alt"></i> Localisation.</p>
                    <button type="button">Voir plus</button>
                </div>
                <div class="events-card">
                    <h2>Title event</h2>
                    <img src="img/fireworks-1.jpg" alt="évenement" />
                    <p><i class="fas fa-map-marker-alt"></i> Localisation.</p>
                    <button type="button">Voir plus</button>
                </div>
                <div class="events-card">
                    <h2>Title event</h2>
                    <img src="img/background-comedie-1.jpg" alt="évenement" />
                    <p><i class="fas fa-map-marker-alt"></i> Localisation.</p>
                    <button type="button">Voir plus</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <span class="logo">
            <h1>Hérault events</h1>
        </span>
        <ul>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
            <li><a href="#">Lien</a></li>
        </ul>
    </footer>
    <script src="https://kit.fontawesome.com/80ea9751af.js" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>