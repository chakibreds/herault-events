
DELIMITER |

DROP PROCEDURE IF EXISTS `throw_err`;
CREATE PROCEDURE `throw_err`(IN msg VARCHAR(255))
BEGIN
    SIGNAL sqlstate '45000' SET MESSAGE_TEXT = msg;
END|

DELIMITER ;

DELIMITER | 

-- TRIGGER qui vérifie qu'un utilisateur à plus de 12 ans 

DROP TRIGGER IF EXISTS `BEFORE_INSERT_USER`;
CREATE TRIGGER `BEFORE_INSERT_USER` BEFORE INSERT ON `user` FOR EACH ROW
BEGIN
    CALL throw_err('ERR');
    IF (DATEDIFF(DATE(NOW()),NEW.date_nai) < (12 * 365)) THEN
        CALL throw_err(CONCAT('cette date : ',NEW.date_nai,' ne respecte pas l age de 12 ans'));
    END IF;
END |

DROP TRIGGER IF EXISTS `BEFORE_UPDATE_USER`;
CREATE TRIGGER `BEFORE_UPDATE_USER` BEFORE UPDATE ON `user` FOR EACH ROW
BEGIN
    IF (DATEDIFF(DATE(NOW()),NEW.date_nai) < (12 * 365)) THEN
        CALL throw_err(CONCAT ('cette date : ',NEW.date_nai,' ne respecte pas l age de 12 ans'));
    END IF;
END |

DELIMITER ;

DELIMITER |

-- un trigger qui verifie que le contributeur d'evenement peut bien contribuer (n'est pas un visiteur seulement)

DROP TRIGGER IF EXISTS `BEFORE_INSERT_EVENT`;
CREATE TRIGGER `BEFORE_INSERT_EVENT` BEFORE INSERT ON `events` FOR EACH ROW
BEGIN
    DECLARE user_role ENUM('visitor', 'contributor', 'admin');
    SELECT role_user INTO user_role FROM user WHERE pseudo = NEW.pseudo_contributor;

    IF (user_role <> 'contributor' AND user_role <> 'admin') THEN
        CALL throw_err(CONCAT("l'utilisateur ", NEW.pseudo_contributor , " ne peut pas contribuer"));
    END IF;
END|

DROP TRIGGER IF EXISTS `BEFORE_INSERT_EVENT`;
CREATE TRIGGER `BEFORE_INSERT_EVENT` BEFORE UPDATE ON `events` FOR EACH ROW
BEGIN
    DECLARE user_role VARCHAR(15);
    SET user_role = (SELECT role_user FROM user WHERE pseudo = NEW.pseudo_contributor);
    IF (user_role = 'visitor') THEN
        CALL throw_err(CONCAT("l'utilisateur ", NEW.pseudo_contributor , " ne peut pas contribuer"));
    END IF;
END|

DELIMITER ;



/**
    TODO 
    - TRIGGER:
        *- brefore : check id_contributor in events is contrubutor or admin (on events)
        * brefore : min_participant must be < to max_participant
        * brefore : date_event à l'insertion doit être > à NOW()
        * after : insertion dans participate insere le meme pseudo et event dans interested
    - FONCTION:
        * calcul la note total d'un events
        * calcul le nombre de participant pour un evenement
        * calcul le nombre de personnes interesser pour une evenement
        * calculer le nombre d'évenement
        * une Procedure qui affiche tout les evenements d'une année
        *les evenement les plus commente
        *une fonction qui affiche le classement d'un event
**/