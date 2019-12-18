
DROP FUNCTION IF EXISTS `note_event`;
DELIMITER |
CREATE FUNCTION `note_event` (event_id INT)
RETURNS FLOAT
BEGIN   
DECLARE moy_note FLOAT;

     SELECT AVG(note) INTO moy_note FROM participate WHERE id_event =  event_id AND note is not null;
     IF(moy_note is NULL)THEN
        RETURN  0;
     END IF;
     RETURN moy_note - 1;
END|

DELIMITER ;

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

DROP FUNCTION IF EXISTS `nb_participants`;
DELIMITER |
CREATE FUNCTION `nb_participants` (event_id INT)
RETURNS INT 
BEGIN   
DECLARE nb_part INT;

     SELECT COUNT(*) INTO nb_part FROM participate WHERE id_event =  event_id ;
     IF(nb_part is NULL)THEN
        RETURN  0;
     END IF;
     RETURN nb_part;
END|
DELIMITER ;

DROP FUNCTION IF EXISTS `nb_interesses`;
DELIMITER |
CREATE FUNCTION `nb_interesses` (event_id INT)
RETURNS INT 
BEGIN   
DECLARE nb_intss INT;

     SELECT COUNT(*) INTO nb_intss FROM interested WHERE id_event =  event_id ;
     IF(nb_intss is NULL)THEN
        RETURN  0;
     END IF;
     RETURN nb_intss;
END|
DELIMITER ;

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


DROP FUNCTION IF EXISTS `classement_event`;
DELIMITER | 
CREATE FUNCTION `classement_event` (id_event INT)
RETURNS INT
BEGIN 
DECLARE classement INT;
SELECT COUNT(*) INTO classement FROM events WHERE note_event(id_event)<note_event(events.id_event);
RETURN classement + 1;
END|
DELIMITER ;