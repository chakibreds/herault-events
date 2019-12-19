/*
    Fichier : creation_GroupeA.sql
    Auteurs : 
        Chakib Elhouiti 21813619
        Massili Kezzoul 21815514
        Nom du groupe : P
*/

CREATE DATABASE IF NOT EXISTS  herault_event;
USE herault_event;

-- Suppression des tables si ils existes
DROP TABLE IF EXISTS interested;
DROP TABLE IF EXISTS participate;
DROP TABLE IF EXISTS commentaire;

DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS adresse;
DROP TABLE IF EXISTS theme;

-- Création des tables
CREATE TABLE adresse (
    id_adresse INT AUTO_INCREMENT,
    num_rue INT NOT NULL,
    nom_rue VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    pays VARCHAR(255) NOT NULL,
    code_postal VARCHAR(5) NOT NULL,
    additional_adresse VARCHAR(255),
    CONSTRAINT PK_adresse PRIMARY KEY (id_adresse)
);

CREATE TABLE user (
    pseudo VARCHAR(100),
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    civilite ENUM('monsieur', 'madame', 'autre') NOT NULL DEFAULT 'autre',
    date_nai DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    tel VARCHAR(20) UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    date_inscr DATETIME NOT NULL,
    role_user ENUM('visitor', 'contributor', 'admin') NOT NULL DEFAULT 'visitor',
    id_adresse INT,
    url_image VARCHAR(255),
    bio TEXT,
    CONSTRAINT PK_user PRIMARY KEY (pseudo),
    CONSTRAINT FK_user_adresse FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse)
);

CREATE TABLE theme(
    titre VARCHAR(100),
    CONSTRAINT PK_theme PRIMARY KEY (titre)
);
CREATE TABLE events (
    id_event INT AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    date_event DATETIME NOT NULL,
    description_event text,
    min_participant INT,
    max_participant INT,
    id_adresse INT,
    url_image VARCHAR(255),
    pseudo_contributor VARCHAR(100) ,
    theme VARCHAR(100) ,
    CONSTRAINT PK_events PRIMARY KEY (id_event),
    CONSTRAINT FK_events_adresse FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse) ON DELETE SET NULL,
    CONSTRAINT FK_events_user FOREIGN KEY (pseudo_contributor) REFERENCES user(pseudo) ON DELETE SET NULL,
    CONSTRAINT FK_events_theme FOREIGN KEY (theme) REFERENCES theme(titre) ON DELETE SET NULL 

);

CREATE TABLE commentaire(
    id_event INT NOT NULL,
    pseudo VARCHAR(100),
    date_commentaire DATETIME,
    text_commentaire TEXT NOT NULL,
    CONSTRAINT PK_commentaire PRIMARY KEY (id_event, pseudo, date_commentaire),
    CONSTRAINT FK_commentaire_events FOREIGN KEY (id_event) REFERENCES events(id_event) ON DELETE CASCADE,
    CONSTRAINT FK_commentaire_user FOREIGN KEY (pseudo) REFERENCES user(pseudo) ON DELETE CASCADE
);

CREATE TABLE participate(
    id_event INT NOT NULL,
    pseudo VARCHAR(100),
    note ENUM('0','1','2','3','4','5'),
    CONSTRAINT PK_participate PRIMARY KEY (id_event, pseudo),
    CONSTRAINT FK_participate_events FOREIGN KEY (id_event) REFERENCES events(id_event) ON DELETE CASCADE,
    CONSTRAINT FK_participate_user FOREIGN KEY (pseudo) REFERENCES user(pseudo) ON DELETE CASCADE
);

CREATE TABLE interested(
    id_event INT NOT NULL,
    pseudo VARCHAR(100),
    CONSTRAINT PK_interested PRIMARY KEY (id_event, pseudo),
    CONSTRAINT FK_interested_events FOREIGN KEY (id_event) REFERENCES events(id_event) ON DELETE CASCADE,
    CONSTRAINT FK_interested_user FOREIGN KEY (pseudo) REFERENCES user(pseudo) ON DELETE CASCADE
);

-- insertion des tuples
-- adresse 
INSERT INTO `adresse` (`id_adresse`, `num_rue`, `nom_rue`, `ville`, `pays`, `code_postal`, `additional_adresse`) VALUES
(1, 29, 'Frederic Peyson', 'Montpellier', 'France', '34000', 'Chez M.Zerroug Djamel'),
(2, 15, 'Colin', 'Montpellier', 'France', '34000', ''),
(3, 1, 'Truel', 'Montpellier', 'France', '34000', ''),
(4, 5, 'Rue du 25 Août 1944', 'Béziers', 'France', '34360', NULL),
(5, 1, 'Quai Antoine Fonquerle', 'Béziers', 'France', '34300', NULL),
(6, 1, 'Place de la Ramade', 'Montpellier', 'France', '34670', NULL),
(7, 148, 'Rue François Desnoyer', 'Montpellier', 'France', '34200', NULL),
(8, 148, 'Rue François Desnoyer', 'Montpellier', 'France', '34200', NULL),
(9, 907, 'Rue du Professeur Blayac', 'Montpellier', 'France', '34185', NULL),
(10, 71, 'Place des Martyrs de la Résistance', 'Montpellier', 'France', '34400', NULL),
(11, 1, 'Rue de la Promenade', 'Béziers', 'France', '34550', NULL),
(12, 1, 'Avenue Président Wilson', 'Béziers', 'France', '34500', NULL);

SELECT * FROM adresse;

-- theme
INSERT INTO `theme` (`titre`) VALUES
('aid'),
('cinema'),
('halloween'),
('informatique'),
('manga'),
('musique'),
('noel'),
('ramdan'),
('science'),
('sport');

SELECT * FROM theme;

-- user
INSERT INTO `user` (`pseudo`, `nom`, `prenom`, `civilite`, `date_nai`, `email`, `tel`, `mdp`, `date_inscr`, `role_user`, `id_adresse`, `url_image`, `bio`) VALUES
('abraham80', 'Reilly', 'Shad', 'madame', '2013-11-27', 'obalistreri@example.net', '1-491-202-4856', '81c1c407f7d4b066bfc711c3eb28d392e2660d86ff6dde2888bc6ce522ef3ebb', '2019-07-04 10:51:42', 'contributor', 1, NULL, 'The March Hare interrupted, yawning. \'I\'m getting tired of being all alone here!\' As she said aloud. \'I shall sit here,\' he said, turning to Alice, very loudly and decidedly, and he wasn\'t one?\'.'),
('aida27', 'Heller', 'Vena', 'monsieur', '1986-01-20', 'buckridge.frederik@example.org', '(037)063-5459x58600', '201c2b135f5d0c90dbf56b0fbcd0f9a1ed9b8fd97c5ba3126a773f8c1a543d84', '2019-01-11 10:44:04', 'visitor', 2, NULL, 'I do so like that curious song about the whiting!\' \'Oh, as to bring but one; Bill\'s got to go on. \'And so these three weeks!\' \'I\'m very sorry you\'ve been annoyed,\' said Alice, who always took a.'),
('aida83', 'Stamm', 'Otilia', 'madame', '2018-10-29', 'payton48@example.org', '084-265-4292', 'ad2114d1c8866596960d76b56b381023ae8c4c1784a356ede927a6395b7abad1', '2019-06-16 20:20:44', 'contributor', 3, NULL, 'Just then she walked sadly down the chimney!\' \'Oh! So Bill\'s got to come upon them THIS size: why, I should understand that better,\' Alice said to the waving of the Shark, But, when the race was.'),
('albertha.mraz', 'Bernier', 'Chaz', 'autre', '1975-02-03', 'coberbrunner@example.net', '(054)348-7305x8337', '8e68d0b9ba163fd9f5e462caf362121474cd20013b24b8baa0db985b54d555c5', '2019-02-17 04:10:59', 'visitor', 4, NULL, 'The door led right into a tidy little room with a bound into the teapot. \'At any rate it would be as well wait, as she picked her way out. \'I shall be late!\' (when she thought it over afterwards, it.'),
('aletha71', 'Gutkowski', 'Florence', 'madame', '1996-02-29', 'legros.barbara@example.com', '+10(0)0901701807', 'ee8d9cc65a915936021a82f97858c1047bf5d884c60c25bcb728d32db5edbee9', '2019-05-23 22:13:53', 'contributor', 5, NULL, 'At this moment Five, who had been (Before she had not gone much farther before she found to be afraid of them!\' \'And who are THESE?\' said the March Hare interrupted, yawning. \'I\'m getting tired of.'),
('april.ryan', 'Schmidt', 'Dianna', 'monsieur', '1973-11-12', 'qhermiston@example.com', '793-061-2522x3365', '6b7c01b944d95fb5d2af8e4d9a999a7a68669a188d711c63a972382b20d06e13', '2019-03-27 07:58:08', 'contributor', 6, NULL, 'This was quite surprised to find that the cause of this pool? I am in the pool, \'and she sits purring so nicely by the officers of the trial.\' \'Stupid things!\' Alice thought this must be what he did.'),
('ari10', 'Trantow', 'Emily', 'madame', '1983-03-25', 'jermain.quigley@example.com', '+18(3)3915238519', 'f20a9b118fea0ce26b5dab8c174f1d7da0d1253d696cc56f79418fcca3c938f3', '2019-03-17 12:20:52', 'visitor', 7, NULL, 'Alice, \'it would have this cat removed!\' The Queen turned crimson with fury, and, after waiting till she had never been in a melancholy air, and, after folding his arms and legs in all directions,.'),
('audrey66', 'Kris', 'Emmitt', 'autre', '2002-10-18', 'lemke.peter@example.com', '946.237.4059x820', '6c841ad8aadb4e8d705b857e52885489975f5c500696244e0599be9a7f01fd0b', '2019-09-20 05:14:08', 'contributor', 8, NULL, 'King. The White Rabbit blew three blasts on the same thing as \"I eat what I used to read fairy-tales, I fancied that kind of serpent, that\'s all I can guess that,\' she added aloud. \'Do you play.'),
('avis79', 'Rice', 'Alyce', 'autre', '1989-06-16', 'annabell27@example.com', '(044)594-5560', '265ffbe0d372fb8858cd98534b5bbc0aa89c3c278a29332f64f383b4187469d2', '2019-09-30 19:20:17', 'contributor', 9, NULL, 'However, it was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the words \'DRINK ME,\' but nevertheless she uncorked it and put it more clearly,\' Alice replied.'),
('barney.lind', 'Upton', 'Marcus', 'autre', '1998-08-30', 'bzieme@example.net', '223-186-1560', '54aedbdcee3a1ac22a41f35d2b97f093728ec7956f72e3658e85c588cf41cd6c', '2019-03-26 04:27:02', 'visitor', 10, NULL, 'You see the Hatter went on, turning to the King, and the White Rabbit cried out, \'Silence in the pool of tears which she concluded that it led into a doze; but, on being pinched by the time it.'),
('Y2ssam', 'Kezzoul', 'Massili', 'monsieur', '1998-08-20', 'massy.kezzoul@gmail.com', '0776021794', '$2y$10$jxJX7qPmUyPd3ahQ8GHeouKpCrCjOcYESgamAb1l1fwgSGo8eIn7O', '2019-12-04 22:18:56', 'admin', 11, 'massy.jpeg', 'Hadi bio ta3 massy.'),
('chakibReds', 'ELHOUITI', 'Chakib', 'monsieur', '1998-09-19', 'celhouiti@gmail.com', '0751847995', '$2y$10$EEvHtqefzRT6AfrMTOH.d..NpWTcMzIUldVQm.Zu4pRMH1IECgSRi', '2019-12-04 22:23:53', 'admin', 12, 'chakib.jpg', 'Bio ta3 chakib');

SELECT * FROM user;

-- events
INSERT INTO `events` (`id_event`, `titre`, `date_event`, `description_event`, `min_participant`, `max_participant`, `id_adresse`, `url_image`, `pseudo_contributor`, `theme`) VALUES
(1, 'Évenement 1', '2020-12-26 17:00:00', 'description de l\'évenement 1', 5, 1000, 2, NULL, 'Y2ssam', 'informatique'),
(2, 'Évenement 2', '2019-12-06 18:00:00', 'description de l\'évenement 2', 100, 10000, 1, NULL, 'chakibReds', 'informatique'),
(3, 'Soutenance projet Web', '2019-12-15 18:00:00', 'Ra7 tetbetchek', 2, 3, 3, '1105133-skyrim-logo.jpg', 'Y2ssam', 'informatique'),
(4, 'Villespassans', '2020-09-21 16:00:00', 'Visite par Jean-Christophe Petit, maire de la ville', 1, 4646, 5, 'http://cibul.s3.amazonaws.com/event_visite-commentee-du-village_765_510511.jpg', 'abraham80', 'cinema'),
(5, 'Convers\'band', '2017-06-21 16:00:00', 'Rock', 30, NULL, 6, NULL, 'chakibReds', 'ramdan'),
(6, 'Saint Pons Capitale / Marathon Culturel', '2018-07-07 16:00:00', 'Visite guidée décalée de Saint Pons revisitant son patrimoine à travers art contemporain et spectacle vivant, humour et dérision. Marathon culturel sous forme d\'un circuit pédestre et performatif', 7, 482842, 8, 'http://cibul.s3.amazonaws.com/event_saint-pons-capitale-marathon-culturel_309007.jpg', 'aida83', 'musique'),
(7, 'Eglise Sainte Cécile de Loupian - Diocèse de Montpellier - 34', '2017-06-24 16:00:00', 'Découverte du patrimoine religieux - concert et prières', 8, NULL, 9, 'http://cibul.s3.amazonaws.com/event_eglise-sainte-cecile-de-loupian_760296.jpg', 'aletha71', 'manga'),
(8, 'Nuit de la Lecture', '2020-01-20 16:00:00', 'Entre textes contemporains des figures du slam français et les plus grands classiques, Saint-Brès propose une Nuit de la lecture intergénérationnelle, ponctuée par des interludes musicaux.', 9, 338820, 5, 'http://cibul.s3.amazonaws.com/event_nuit-de-la-lecture_352_162979.jpg', 'april.ryan', 'manga'),
(9, 'Visite commentée', '2020-09-20 16:00:00', 'Musée Paul Valéry - Sète - 11:00', 70, NULL, 12, 'http://cibul.s3.amazonaws.com/event49379413.jpg', 'avis79', 'informatique'),
(10, 'Atelier famille : aquarelles, marines et cartes postales', '2014-05-17 16:00:00', 'Autour des collections', 1, 439584, 7, NULL, 'avis79', 'halloween'),
(11, 'Soirée lectures', '2019-01-18 16:00:00', 'Lectures sorties du panier', 41, 392444, 3, 'http://cibul.s3.amazonaws.com/event_soiree-lectures_499_725388.jpg', 'avis79', 'manga');

select * from events;

INSERT INTO `interested` (`id_event`, `pseudo`) VALUES
(1, 'abraham80'),
(1, 'aida27'),
(1, 'aida83'),
(1, 'albertha.mraz'),
(2, 'aletha71'),
(3, 'april.ryan'),
(4, 'ari10'),
(4, 'audrey66'),
(4, 'avis79'),
(4, 'barney.lind'),
(5, 'Y2ssam'),
(5, 'chakibReds'),
(5, 'abraham80'),
(5, 'aida27'),
(6, 'aida83'),
(6, 'albertha.mraz'),
(6, 'aletha71'),
(7, 'ari10'),
(7, 'audrey66'),
(8, 'avis79'),
(8, 'barney.lind'),
(8, 'Y2ssam'),
(8, 'chakibReds'),
(8, 'abraham80'),
(8, 'aida27'),
(9, 'aida83'),
(9, 'albertha.mraz'),
(10, 'aletha71'),
(10, 'ari10'),
(11, 'audrey66'),
(11, 'avis79'),
(10, 'Y2ssam'),
(11, 'Y2ssam');

select * from interested;

INSERT INTO `participate` (`id_event`, `pseudo`,`note`) VALUES
(1, 'abraham80',NULL),
(1, 'aida27',NULL),
(1, 'aida83',NULL),
(1, 'albertha.mraz',NULL),
(2, 'aletha71','0'),
(3, 'april.ryan','3'),
(4, 'ari10',NULL),
(4, 'audrey66',NULL),
(4, 'avis79',NULL),
(4, 'barney.lind',NULL),
(5, 'Y2ssam','0'),
(5, 'chakibReds','2'),
(5, 'abraham80','0'),
(5, 'aida27','5'),
(6, 'aida83','1'),
(6, 'albertha.mraz','0'),
(6, 'aletha71','2'),
(7, 'ari10','3'),
(7, 'audrey66','2'),
(8, 'avis79',NULL),
(8, 'barney.lind',NULL),
(8, 'Y2ssam',NULL),
(8, 'chakibReds',NULL),
(8, 'abraham80',NULL),
(8, 'aida27',NULL),
(9, 'aida83',NULL),
(9, 'albertha.mraz',NULL),
(10, 'aletha71','1'),
(10, 'ari10','0'),
(11, 'audrey66','5'),
(11, 'avis79','4'),
(10, 'Y2ssam','4'),
(11, 'Y2ssam','5');

select * from participate;

-- commentaire
INSERT INTO `commentaire` (`id_event`,`pseudo`,`date_commentaire`,`text_commentaire`) VALUES
(1,'aida27',NOW(),'lorem ipsum'),
(2,'aletha71',NOW(),'lorem ipsum'),
(10,'ari10',NOW(),'lorem ipsum'),
(8,'Y2ssam',NOW(),'lorem ipsum');

select * from commentaire;

-- creation des procedures
DELIMITER |

DROP PROCEDURE IF EXISTS `throw_err`|
CREATE PROCEDURE `throw_err`(IN msg VARCHAR(255))
BEGIN
    SIGNAL sqlstate '45000' SET MESSAGE_TEXT = msg;
END|

DELIMITER ;


-- select les évenements ou les utilisateurs d'une année donnée
DROP PROCEDURE IF EXISTS `events_users_par_annee`;
DELIMITER |
CREATE PROCEDURE `events_users_par_annee` (IN annee VARCHAR(4),IN user_event ENUM('events','utilisateurs'))
BEGIN
    IF (user_event = 'events') THEN
    SELECT titre,pseudo_contributor,date_event FROM events
    WHERE date_event BETWEEN str_to_date(CONCAT(annee,'-01-01'),'%Y-%m-%d') AND str_to_date(CONCAT(annee,'-12-31'),'%Y-%m-%d');
    ELSE
    SELECT pseudo,nom,prenom FROM user
    WHERE date_inscr BETWEEN str_to_date(CONCAT(annee,'-01-01'),'%Y-%m-%d') AND str_to_date(CONCAT(annee,'-12-31'),'%Y-%m-%d');
    END IF;
    
END|
DELIMITER ;

-- select les évenements par nombre de commentaires en ordre ascendant ou descendant
DROP PROCEDURE IF EXISTS `events_par_commentaires`;
DELIMITER |
CREATE PROCEDURE `events_par_commentaires` (IN asc_desc VARCHAR(4))
BEGIN
    IF (asc_desc = 'asc')THEN
    SELECT * FROM (SELECT id_event,COUNT(*) AS nb_comm FROM commentaire GROUP BY id_event) AS nb_comm_by_event
    ORDER BY nb_comm asc;
    ELSE 
    SELECT * FROM (SELECT id_event,COUNT(*) AS nb_comm FROM commentaire GROUP BY id_event) AS nb_comm_by_event
    ORDER BY nb_comm desc ;
    END IF;
END|
DELIMITER ;

DELIMITER | 

-- TRIGGER qui vérifie qu'un utilisateur à plus de 12 ans 

DROP TRIGGER IF EXISTS `BEFORE_INSERT_USER`|
CREATE TRIGGER `BEFORE_INSERT_USER` BEFORE INSERT ON `user` FOR EACH ROW
BEGIN
    IF (DATEDIFF(DATE(NOW()),NEW.date_nai) < (12 * 365)) THEN
        CALL throw_err(CONCAT('cette date : ',NEW.date_nai,' ne respecte pas l age de 12 ans'));
    END IF;
END |

DROP TRIGGER IF EXISTS `BEFORE_UPDATE_USER`|
CREATE TRIGGER `BEFORE_UPDATE_USER` BEFORE UPDATE ON `user` FOR EACH ROW
BEGIN
    IF (DATEDIFF(DATE(NOW()),NEW.date_nai) < (12 * 365)) THEN
        CALL throw_err(CONCAT ('cette date : ',NEW.date_nai,' ne respecte pas l age de 12 ans'));
    END IF;
END |

DELIMITER ;

DELIMITER |

-- un trigger qui verifie que le contributeur d'evenement peut bien contribuer (n'est pas un visiteur seulement)

DROP TRIGGER IF EXISTS `BEFORE_INSERT_CONTRIBUTEUR_EVENT`|
CREATE TRIGGER `BEFORE_INSERT_CONTRIBUTEUR_EVENT` BEFORE INSERT ON `events` FOR EACH ROW
BEGIN
    DECLARE user_role VARCHAR(15);
    SET user_role = (SELECT role_user FROM user WHERE pseudo = NEW.pseudo_contributor);
    IF (user_role = 'visitor') THEN
        CALL throw_err(CONCAT("l'utilisateur ", NEW.pseudo_contributor , " ne peut pas contribuer"));
    END IF;
END|

DROP TRIGGER IF EXISTS `BEFORE_UPDATE_CONTRIBUTEUR_EVENT`|
CREATE TRIGGER `BEFORE_UPDATE_CONTRIBUTEUR_EVENT` BEFORE UPDATE ON `events` FOR EACH ROW
BEGIN
    DECLARE user_role VARCHAR(15);
    SET user_role = (SELECT role_user FROM user WHERE pseudo = NEW.pseudo_contributor);
    IF (user_role = 'visitor') THEN
        CALL throw_err(CONCAT("l'utilisateur ", NEW.pseudo_contributor , " ne peut pas contribuer"));
    END IF;
END|

DELIMITER ;

DELIMITER |

-- un trigger qui verifie que date_event à l'insertion est supérieur à la date courante

DROP TRIGGER IF EXISTS `BEFORE_INSERT_DATE_EVENT`|
CREATE TRIGGER `BEFORE_INSERT_DATE_EVENT` AFTER INSERT ON `events` FOR EACH ROW
BEGIN
    IF (NEW.date_event < NOW()) THEN
        CALL throw_err('Evenement passé ne peut pas être ajouté');
    END IF;
END|

DROP TRIGGER IF EXISTS `BEFORE_UPDATE_DATE_EVENT`|
CREATE TRIGGER `BEFORE_UPDATE_DATE_EVENT` AFTER UPDATE ON `events` FOR EACH ROW
BEGIN
    IF (NEW.date_event < NOW()) THEN
        CALL throw_err('Evenement passé ne peut pas être mis a jour');
    END IF;
END|

DELIMITER ;

DELIMITER |

-- Ce trigger empeche d'inserer de note dans participate tant que l'evenement n'est pas passé

DROP TRIGGER IF EXISTS `BEFORE_INSERT_NOTE_PARTICIPATE`|
CREATE TRIGGER `BEFORE_INSERT_NOTE_PARTICIPATE` BEFORE INSERT ON `participate` FOR EACH ROW
BEGIN
    IF (NEW.note IS NOT NULL AND (SELECT date_event FROM events WHERE id_event = NEW.id_event) > NOW()) THEN
        CALL throw_err('Ne peut pas noter un evenement futur');
    END IF;
END|

DELIMITER ;

DELIMITER |

-- Toute personne participant à un evenement est insererer dans la table interested

DROP TRIGGER IF EXISTS `AFTER_INSERT_PARTICIPATE_INTERESTED`|
CREATE TRIGGER `AFTER_INSERT_PARTICIPATE_INTERESTED` AFTER INSERT ON `participate` FOR EACH ROW
BEGIN
    DECLARE exist INT;
    SET exist = (SELECT count(*) FROM interested WHERE pseudo = NEW.pseudo);
    IF (exist = 0) THEN
        INSERT INTO `interested` (`id_event`,`pseudo`) VALUES (NEW.id_event, NEW.pseudo );
    END IF;
END|

DELIMITER ;

-- creation des fonctions

-- calcul la note moyenne d'un évenement donné
DROP FUNCTION IF EXISTS `note_event`;
DELIMITER |
CREATE FUNCTION `note_event` (event_id INT)
RETURNS FLOAT
DETERMINISTIC
BEGIN   
DECLARE moy_note FLOAT;
DECLARE true_false INT;
        SELECT COUNT(*) INTO true_false FROM events  WHERE id_event = event_id;
    IF (true_false = 0) THEN
        CALL throw_err("l'évenement n'existe pas");
    ELSE
        SELECT AVG(note) INTO moy_note FROM participate WHERE id_event =  event_id AND note is not null;
        IF(moy_note is NULL)THEN
            RETURN  0;
        END IF;    
        RETURN moy_note - 1;
    END IF;

END|

DELIMITER ;

-- calcul le nombre de particicpants
DROP FUNCTION IF EXISTS `nb_participants`;
DELIMITER |
CREATE FUNCTION `nb_participants` (event_id INT)
RETURNS INT 
DETERMINISTIC
BEGIN   
DECLARE nb_part INT;
DECLARE true_false INT;
        SELECT COUNT(*) INTO true_false FROM events  WHERE id_event = event_id;
    IF (true_false = 0) THEN
        CALL throw_err("l'évenement n'existe pas");
    ELSE
        SELECT COUNT(*) INTO nb_part FROM participate WHERE id_event =  event_id ;
        IF(nb_part is NULL)THEN
            RETURN  0;
        END IF;
        RETURN nb_part;
    END IF;
END|
DELIMITER ;

-- calcul le nombre de personnes intéressées
DROP FUNCTION IF EXISTS `nb_interesses`;
DELIMITER |
CREATE FUNCTION `nb_interesses` (event_id INT)
RETURNS INT 
DETERMINISTIC
BEGIN   
DECLARE nb_intss INT;
DECLARE true_false INT;
        SELECT COUNT(*) INTO true_false FROM events  WHERE id_event = event_id;
    IF (true_false = 0) THEN
        CALL throw_err("l'évenement n'existe pas");
    ELSE
        SELECT COUNT(*) INTO nb_intss FROM interested WHERE id_event =  event_id ;
        IF(nb_intss is NULL)THEN
            RETURN  0;
        END IF;
        RETURN nb_intss;
    END IF;
END|
DELIMITER ;

-- retourne le classement d'un évenements donné par note moy(s'il y'a des évenements de même note moyenne la function retourne l'évenement en première position à cause de l'inférieur strictement)

DROP FUNCTION IF EXISTS `classement_event`;
DELIMITER | 
CREATE FUNCTION `classement_event` (event_id INT)
RETURNS INT
DETERMINISTIC
BEGIN 
DECLARE classement_depart INT;
DECLARE classement_final INT;
DECLARE true_false INT;
        SELECT COUNT(*) INTO true_false FROM events  WHERE id_event = event_id;
    IF (true_false = 0) THEN
        CALL throw_err("l'évenement n'existe pas");
    ELSE
        SELECT COUNT(*) INTO classement_depart FROM events WHERE note_event(event_id)<=note_event(events.id_event);

        SELECT COUNT(*) INTO classement_final FROM (SELECT * FROM events WHERE note_event(event_id)=note_event(events.id_event))AS tmp_table
        WHERE event_id < id_event AND id_event!=event_id;
        
        RETURN classement_depart -  classement_final ;
    END IF;
END|
DELIMITER ;