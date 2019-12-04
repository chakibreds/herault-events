/*
    Ce fichier contient les insertion des tuples de test dans la base de données
*/
/* WARNING !!!! */
/* delete everything before insert */

DELETE FROM events;
DELETE FROM user;
DELETE FROM adresse;

/* INSERTION ADRESSE */

INSERT INTO adresse VALUES(NULL,29,'FREDERIC PEYSON','MONTPELLIER','FRANCE',34000,'CHEZ M. ZERROUG DJAMEL');
INSERT INTO adresse VALUES(NULL,15,'COLLIN','MONTPELLIER','FRANCE',34000,NULL);
INSERT INTO adresse VALUES(NULL,20,'NACERIA','BEJAIA','ALGERIE',06000,NULL);
INSERT INTO adresse VALUES(NULL,19,'USTHB','ALGER','ALGERIE',16000,NULL);

/* insertion des user */
INSERT INTO user VALUES('y2ssam','Kezzoul','Massili','1998-08-20','massy.kezzoul@gmail.com',NULL,'password','2019-11-07 17:57:00','admin',1);
INSERT INTO user VALUES('chakibReds','ELHOUITI','Chakib','1998-09-19','celhouiti@gmail.com',NULL,'password','2019-12-04 19:14:00','admin',2);

/* INSERTION des events */

INSERT INTO events VALUES(NULL,'Evenement type','2019-11-07 17:57:00',"Prototype d'évenement",NULL,NULL,NULL,4,'y2ssam');
INSERT INTO events VALUES(NULL,'Erreur','2019-11-07 18:05:00',"Prototype d'évenement qui doit retourner une erreur",NULL,NULL,NULL,NULL,'y2ssam');


