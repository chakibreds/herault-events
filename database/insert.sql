/*
    Ce fichier contient les insertion des tuples de test dans la base de données
*/
/* WARNING !!!! */
/* delete everything before insert */

DELETE FROM events;
DELETE FROM theme;
DELETE FROM user;
DELETE FROM adresse;

DELETE FROM ERREUR_INSERT;

/* INSERTION ADRESSE */

INSERT INTO `adresse` (`id_adresse`, `num_rue`, `nom_rue`, `ville`, `pays`, `code_postal`, `additional_adresse`) VALUES
(1, 29, 'Frederic Peyson', 'Montpellier', 'France', '34000', 'Chez M.Zerroug Djamel'),
(2, 15, 'Colin', 'Montpellier', 'France', '34000', ''),
(3, 1, 'Truel', 'Montpellier', 'France', '34000', '');

/* insertion des user */

INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `civilite`, `date_nai`, `email`, `tel`, `mdp`, `date_inscr`, `role_user`, `id_adresse`, `url_image`, `bio`) VALUES
('chakibReds', 'ELHOUITI', 'Chakib', 'monsieur', '1998-09-19', 'celhouiti@gmail.com', '0751847995', '$2y$10$EEvHtqefzRT6AfrMTOH.d..NpWTcMzIUldVQm.Zu4pRMH1IECgSRi', '2019-12-04 22:23:53', 'admin', 2, NULL, 'Bio ta3 chakib'),
('Y2ssam', 'Kezzoul', 'Massili', 'monsieur', '1998-08-20', 'massy.kezzoul@gmail.com', '0776021794', '$2y$10$jxJX7qPmUyPd3ahQ8GHeouKpCrCjOcYESgamAb1l1fwgSGo8eIn7O', '2019-12-04 22:18:56', 'admin', 1, 'massy.jpeg', 'Hadi bio ta3 massy.');

/* INSERTION des themes */

INSERT INTO theme (`titre`) VALUES
("informatique");

/* INSERTION des events */

INSERT INTO `events` (`id_event`, `titre`, `date_event`, `description_event`, `min_participant`, `max_participant`, `id_adresse`, `url_image`, `pseudo_contributor`, `theme`) VALUES
(1, 'Évenement 1', '2019-11-07 17:00:00', 'description de l\'évenement 1', 5, 1000, 2, NULL, 'Y2ssam', 'informatique'),
(2, 'Évenement 2', '2019-12-06 18:00:00', 'description de l\'évenement 2', 100, 10000, 1, NULL, 'chakibReds', 'informatique'),
(3, 'Soutenance projet Web', '2019-12-18 09:00:00', 'Ra7 tetbetchek', 2, 3, 3, '1105133-skyrim-logo.jpg', 'Y2ssam', 'informatique');

/* INSERTION participation */
INSERT INTO `participate` (`pseudo`,`id_event`,`note`) VALUES
('Y2ssam',1,NULL),
('chakibReds',2,NULL),
('Y2ssam',3,NULL),
('Y2ssam',2,NULL),
('chakibReds',3,NULL);

/* INSERTION inetresser */
INSERT INTO `interested` (`pseudo`,`id_event`) VALUES
('Y2ssam',2),
('chakibReds',1),
('Y2ssam',3),
('chakibReds',3);

/* ERREUR */
INSERT INTO `ERREUR_INSERT` (`TEXT_ERREUR`) VALUES
("ERR_CHK_EVENTS_ADRESSE");