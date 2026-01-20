--creation DataBase
CREATE DATABASE Coach_sportif;


--create table users
CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    nom varchar(50) NOT NULL,
    email varchar(250) UNIQUE NOT NULL,
    telephone varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    role VARCHAR(20) CHECK (role IN('sportif','admin','coach'))
);

--create table coach
CREATE TABLE coach (
    id_coach SERIAL PRIMARY KEY,
    id_user INT ,
    experience INT NOT NULL,
    discipline VARCHAR(50) Not NULL,
    biographie TEXT NOT NULL,
    photo VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
);


--create table sportif
CREATE TABLE sportif (
    id_sportif SERIAL PRIMARY KEY,
    id_user INT ,
    niveau VARCHAR(50),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

--create table reserrvation
CREATE TABLE reservation (
    id_reserv SERIAL PRIMARY KEY,
    id_coach INT,
    id_sportif INT,
    date_r DATE,
    heure TIME,
    statut VARCHAR(25) CHECK(statut IN('acceptée','en_attente','refusée')),
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach),
    FOREIGN KEY (id_sportif) REFERENCES sportif(id_sportif)
);

--create table Seance
CREATE TABLE Seance(
    id SERIAL PRIMARY KEY,
    id_coach INT NOT NULL,
    jour  DATE,
    heure_d TIME(0),
    heure_f TIME(0),
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach)
);
