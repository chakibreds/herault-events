<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login HéraultEvents</title>
    <link rel="icon" href="./img/logo/HE-icon.png" type="image/png">
    <link rel="stylesheet" href="./css/signUp.css">
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
                <div class="nom-prenom">
                    <div class="input-label">
                        <input type="text" name="nom" id="nom" required>
                        <label for="nom">Nom </label>
                    </div>
                    <div class="input-label">
                        <input type="text" name="prenom" id="prenom" required>
                        <label for="prenom">Prénom</label>
                    </div>
                </div>
                <div class="input-label">
                    <input type="date" name="date_nai" id="date_nai" required>
                    <label for="date_nai">Date de naissance</label>
                </div>
                <div class="adresse1">
                    <div class="input-label">
                        <input type="number" name="num-r" id="num-r">
                        <label for="num-r">N°rue</label>
                    </div>
                    <div class="input-label">
                        <input type="text" name="nom-r" id="nom-r">
                        <label for="nom-r">Nom rue</label>
                    </div>
                    <div class="input-label">
                        <input type="number" name="code-postal" id="code-postal" pattern="[0-9]{5}">
                        <label for="code-postal">Code Postal</label>
                    </div>
                </div>
                <div class="adresse2">
                    <div class="input-label">
                        <input type="text" name="ville" id="ville">
                        <label for="ville">Ville</label>
                    </div>
                    <div class="input-label">
                        <input type="text" name="Pays" id="Pays">
                        <label for="Pays">Pays</label>
                    </div>
                </div>
                <div class="input-label">
                    <input type="text" name="complementAdr" id="complementAdr">
                    <label for="complementAdr">Complement d'adresse</label>
                </div>
                <div class="email-tel">
                    <div class="input-label">
                        <input type="email" name="email" id="email" required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-label">
                        <input type="tel" name="tel" id="tel" pattern="[0-9]{10}" required>
                        <label for="tel">Téléphone</label>
                    </div>
                </div>
                <div class="input-label">
                    <input type="text" name="pseudo" id="pseudo" required>
                    <label for="pseudo">Nom d'utilisateur</label>
                </div>
                <div class="mdp">
                    <div class="input-label">
                        <input type="password" name="password" id="password" required>
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="input-label">
                        <input type="password" name="password" id="password" required>
                        <label for="password">confirmation</label>
                    </div>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
        </div>
        <div class="old-compte">
            <p>Vous avez déja un compte ? <a href="signIn.php">Connectez vous !</a></p>
        </div>
    </main>
</body>

</html>