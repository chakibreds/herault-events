/* 
    Ce fichier contient la définition des tables utilisé dans la projet herault-events
*/
/* 
    Suppression des tables si ils existes
*/
DROP TABLE IF EXISTS user;

DROP TABLE IF EXISTS events;

DROP TABLE IF EXISTS adresse;

DROP TABLE IF EXISTS participate;

DROP TABLE IF EXISTS interested;

DROP TABLE IF EXISTS commentaire;

/* 
    Création des tables
*/
/* Table adress*/
CREATE TABLE adresse (
    id_adresse INT AUTO_INCREMENT,
    num_rue INT,
    nom_rue VARCHAR,
    ville VARCHAR,
    pays VARCHAR,
    code_postal INT,
    additional_adresse VARCHAR,
    PRIMARY KEY (id_adresse)
)

/* Table user */
CREATE TABLE user (
    pseudo VARCHAR(100),
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_nai DATETIME NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    tel VARCHAR(20) UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    date_inscr DATETIME NOT NULL,
    role_user ENUM('visitor', 'contributor', 'admin') NOT NULL DEFAULT 'visitor',
    id_adresse INT,
    PRIMARY KEY (pseudo),
    FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse)
);

/*table event*/
CREATE TABLE events (
    id_event INT AUTO_INCREMENT,
    titre VARCHAR,
    gps_coord INT,
    date_event DATETIME,
    description_event text,
    min_participant INT,
    max_participant INT,
    id_adresse INT ,
    pseudo_contributor VARCHAR,
    PRIMARY KEY (id_event),
    FOREIGN KEY (id_adresse) REFERENCES adresse(id_adresse),
    FOREIGN KEY (pseudo_conributor) REFERENCES user(pseudo)
)

/*table commentaire*/
CREATE TABLE commentaire(
    id_event INT,
    pseudo VARCHAR,
    date_commentaire DATETIME,
    text_commentaire text,
    PRIMARY KEY (id_event, pseudo),
    FOREIGN KEY (id_event) REFERENCES events(id_event) FOREIGN KEY (pseudo) REFERENCES user(pseudo)
)
/*table participate*/
CREATE TABLE participate(
    id_event INT,
    pseudo VARCHAR,
    note INT IN(0,1,2,3,4,5),
    PRIMARY KEY (id_event, pseudo),
    FOREIGN KEY (id_event) REFERENCES events(id_event) FOREIGN KEY (pseudo) REFERENCES user(pseudo)
)
/*table interested*/
CREATE TABLE interested(
    id_event INT,
    pseudo VARCHAR,
    PRIMARY KEY (id_event, pseudo),
    FOREIGN KEY (id_event) REFERENCES events(id_event) FOREIGN KEY (pseudo) REFERENCES user(pseudo)
)
