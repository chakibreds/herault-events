
DELIMITER |

DROP PROCEDURE IF EXISTS `throw_err`;
CREATE PROCEDURE `throw_err`(IN msg VARCHAR(255))
BEGIN
    SIGNAL sqlstate '45000' SET MESSAGE_TEXT = msg;
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