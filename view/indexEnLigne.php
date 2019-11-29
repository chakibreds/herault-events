<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Acceuil";

require $dir_root . 'view/head.php';


?>

<body>
    <?php require_once $dir_root . 'view/headerEnLigne.php'; ?>
    <main class="index-en-ligne">
        <aside class="explore">
            <h2>Best ratted events</h2>
            <input type="text" placeholder="Trouver un évenment..." class="find-event" />
            <ul>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
                <a href="#" class="event">
                    <h3><i class="fas fa-calendar-plus"></i>Titre event</h3>
                </a>
            </ul>
        </aside>
        <article class="acceuil">
            <section class="my-events">
                <h2>Mes évenement</h2>
                <ul>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <button type="button"><i class="fas fa-minus"></i> Supprimer</button>
                    </a>
                </ul>
            </section>
            <section class="find-events">
                <h2>Évenement pouvant m'interesser</h2>
                <ul>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <div class="button">
                            <button type="button">
                                <i class="fas fa-heart"></i>
                                Intéresser
                            </button>
                            <button type="button"><i class="fas fa-plus"></i> Participer</button>
                        </div>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <div class="button">
                            <button type="button">
                                <i class="fas fa-heart"></i>
                                Intéresser
                            </button>
                            <button type="button"><i class="fas fa-plus"></i> Participer</button>
                        </div>
                    </a>
                    <a href="#" class="event-card">
                        <h3>Title event</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati et non illum, tenetur error voluptatem quis in perferendis nemo dolorum incidunt earum laudantium facilis vitae fugit cumque, quam saepe numquam.</p>
                        <div class="localisation">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Location</p>
                        </div>
                        <div class="button">
                            <button type="button">
                                <i class="fas fa-heart"></i>
                                Intéresser
                            </button>
                            <button type="button"><i class="fas fa-plus"></i> Participer</button>
                        </div>
                    </a>
                </ul>
            </section>
        </article>
    </main>

    <?php require_once $dir_root . 'view/footer.php'; ?>
</body>

</html>