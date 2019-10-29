<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HéraultEvents</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
</head>

<body>
    <header>
        <span class="logo">
            <h1>
                Hérault events
            </h1>
        </span>
        <nav>
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
            </div>
            <div class="form">
                <form action="" class="find-form">
                    <label for="find">Rechercher un événement</label>
                    <div class="find">
                        <input type="text" name="find" id="find" />
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <form action="" class="sign-up">
                    <div class="pseudo">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo">
                    </div>
                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="password">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
            </div>
        </section>
    </main>

    <footer>

    </footer>
</body>

</html>