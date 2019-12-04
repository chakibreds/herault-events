/*
    Ce fichier contient les insertion des tuples de test dans la base de données
*/
/* WARNING !!!! */
/* delete everything before insert */

DELETE FROM events;
DELETE FROM user;
DELETE FROM adresse;

/* INSERTION ADRESSE */

INSERT INTO `adresse` (`id_adresse`, `num_rue`, `nom_rue`, `ville`, `pays`, `code_postal`, `additional_adresse`) VALUES
(1, 29, 'Frederic Peyson', 'Montpellier', 'France', '34000', 'Chez M.Zerroug Djamel'),
(2, 15, 'Collin', 'Montpellier', 'France', '34000', '');

/* insertion des user */

INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `civilite`, `date_nai`, `email`, `tel`, `mdp`, `date_inscr`, `role_user`, `id_adresse`) VALUES
('chakibReds', 'ELHOUITI', 'Chakib', 'monsieur', '1998-09-19', 'celhouiti@gmail.com', '0751847995', '$2y$10$EEvHtqefzRT6AfrMTOH.d..NpWTcMzIUldVQm.Zu4pRMH1IECgSRi', '2019-12-04 22:23:53', 'admin', 2),
('Y2ssam', 'Kezzoul', 'Massili', 'monsieur', '1998-08-20', 'massy.kezzoul@gmail.com', '0776021794', '$2y$10$jxJX7qPmUyPd3ahQ8GHeouKpCrCjOcYESgamAb1l1fwgSGo8eIn7O', '2019-12-04 22:18:56', 'admin', 1);

/* INSERTION des events */

INSERT INTO events VALUES(NULL,'Evenement type','2019-11-07 17:57:00',"Prototype d'évenement",NULL,NULL,NULL,4,'y2ssam');
INSERT INTO events VALUES(NULL,'Erreur','2019-11-07 18:05:00',"Prototype d'évenement qui doit retourner une erreur",NULL,NULL,NULL,NULL,'y2ssam');

/* ERREUR */
INSERT INTO `ERREUR_INSERT` (`TEXT_ERREUR`) VALUES
('ERR_CHK_EVENTS_ADRESSE');