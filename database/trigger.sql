/* 
    CREATE [OR REPLACE ] TRIGGER nom_trigger
    {BEFORE | AFTER | INSTEAD OF } {INSERT[OR] | UPDATE [OR] | DELETE} 
    [OF col_name] ON table_name 
    [REFERENCING OLD AS o NEW AS n]
    [FOR EACH ROW] WHEN (condition)  
    DECLARE   
        Declaration-statements
    BEGIN    
        Executable-statements
        EXCEPTION   
            Exception-handling-statements
    END;
 */

DELIMITER //

CREATE TRIGGER CHK_EVENTS_ADRESSE
BEFORE INSERT 
ON events FOR EACH ROW
BEGIN
    IF (gps_coord IS NULL AND id_adresse IS NULL) THEN
        INSERT INTO ERREUR_INSERT(TEXT_ERREUR) VALUES('ERR_CHK_EVENTS_ADRESSE');
    END IF;

END//

DELIMITER ;





/* CONSTRAINT CHK_events_adresse CHECK (gps_coord IS NOT NULL OR id_adresse IS NOT NULL),*/ 
