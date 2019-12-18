/**
    Test des Trigger, fonctions et procedures
 */

system echo "\nInsertion des tuples pour les test\n";

INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `date_nai`, `email`, `mdp`, `date_inscr`, `role_user`) 
VALUES ('IamVisitor', 'e', 'e', '1999-11-27', 'obalistri@exae.net', 'mdp', '2019-07-04 10:51:42','visitor');

INSERT INTO `events` (`id_event`,`titre`, `date_event`) VALUES (-1,'Evenement qui ne risque pas dexister','2098-08-20');

system echo "\nTest des Triggers\n";
-- Ces insertions doivent retourner des erreurs

-- Trigger : BEFORE_INSERT_USER

INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `date_nai`, `email`, `mdp`, `date_inscr`) 
VALUES ('abraham80000', 'Reilly', 'Shad', '2019-11-27', 'obalistreri@exae.net', ' ', '2019-07-04 10:51:42');

-- Trigger : BEFORE_INSERT_EVENT

INSERT INTO `events` (`titre`, `date_event`, `pseudo_contributor`) 
VALUES ('ev', '2019-11-07 17:00:00','IamVisitor');

-- Trigger : `BEFORE_INSERT_DATE_EVENT`

INSERT INTO `events` (`titre`, `date_event`) 
VALUES ('ev', '1998-08-20 17:00:00');

-- Trigger : `BEFORE_INSERT_NOTE_PARTICIPATE`

INSERT INTO `participate` VALUES (-1,'IamVisitor','3');

-- Trigger : `AFTER_INSERT_PARTICIPATE_INTERESTED`

INSERT INTO `participate` VALUES (-1,'IamVisitor',NULL);

SELECT * FROM interested WHERE id_event = -1 AND pseudo = 'IamVisitor';
DELETE FROM interested WHERE id_event = -1 AND pseudo = 'IamVisitor';

system echo "\nFin des test des triggers\n";

system echo "\nSupression des tuples de test\n";

DELETE FROM `user` WHERE pseudo = 'IamVisitor';
DELETE FROM `events` WHERE id_event = -1;

/* 
INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `date_nai`, `email`, `mdp`, `date_inscr`) 
VALUES ('abraham80000', 'Reilly', 'Shad', '2019-11-27', 'obalistreri@exae.net', ' ', '2019-07-04 10:51:42');

INSERT INTO `events` (`id_event`, `titre`, `date_event`, `description_event`, `min_participant`, `max_participant`, `id_adresse`, `url_image`, `pseudo_contributor`, `theme`) VALUES
(1, 'Évenement 1', '2019-11-07 17:00:00', 'description de l\'évenement 1', 5, 1000, 2, NULL, 'Y2ssam', 'informatique'),
(2, 'Évenement 2', '2019-12-06 18:00:00', 'description de l\'évenement 2', 100, 10000, 1, NULL, 'chakibReds', 'informatique');

*/