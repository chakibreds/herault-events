<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login HéraultEvents</title>
    <link rel="icon" href="./img/logo/HE-icon.png" type="image/png">
    <link rel="stylesheet" href="./css/signIn.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>

<body>
    <header class="">

    </header>
    <main>

        <div class="form">
            <span class="logo">
                <a href="index.php"> <img src="./img/logo/HE-noir.png" alt=""> </a>
            </span>
            <form action="">
                <div class="pseudo">
                    <label for="pseudo">Nom d'utilisateur</label>
                    <input type="text" name="pseudo" id="pseudo">
                </div>
                <div class="nom">
                    <label for="nom">Nom </label>
                    <input type="text" name="nom" id="nom">
                </div>
                <div class="prenom">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom">
                </div>
                <div class="date_nai">
                    <label for="date_nai">Date de naissance</label>
                    <input type="date" name="date_nai" id="date_nai">
                </div>
                <div class="email">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="tel">
                    <label for="tel">Téléphone</label>
                    <input type="tel" name="tel" id="tel" pattern="">
                </div>
                <div class="password">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
        </div>
    </main>
</body>

</html>