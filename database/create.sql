/* 
    Ce fichier contient la définition des tables utilisé dans la projet herault-events
*/
/* 
    Suppression des tables si ils existes
*/


DROP TABLE IF EXISTS interested;
DROP TABLE IF EXISTS participate;
DROP TABLE IF EXISTS commentaire;

DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS adresse;
DROP TABLE IF EXISTS theme;

/* 
    Création des tables
*/
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