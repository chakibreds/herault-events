/* 
    Ce fichier contient la définition des tables utilisé dans la projet herault-events
*/

/* 
    Suppression des tables si ils existes
*/

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS adress;
DROP TABLE IF EXISTS participate;
DROP TABLE IF EXISTS interested;
DROP TABLE IF EXISTS comment;

/* 
    Création des tables
*/
/* Table adress*/
CREATE TABLE adress (
    id_address INT AUTO_INCREMENT, 
)

/* Table user */
CREATE TABLE user (
    user_name VARCHAR(100),
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL,
    role ENUM('vistor','contributor','admin') NOT NULL DEFAULT 'visitor',
    id_address INT,
    PRIMARY KEY (user_name),
    FOREIGN KEY (id_address) REFERENCES adress(id_address)

);
