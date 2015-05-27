CREATE TABLE Users (
login varchar(50),
password varchar(50),
nom varchar(50),
prenom varchar(50),
email varchar(100),
telephone varchar(15),
adresse varchar(300),
date_enregistrement date,
crédits integer,
birthDate date,
CONSTRAINT pk_users PRIMARY KEY (login)
);


CREATE TABLE Categories (
    libelleCategorie varchar(50),
    CONSTRAINT pk_categories PRIMARY KEY (libelleCategorie)
);

INSERT INTO Categories (libelleCategorie) VALUES ('Animalerie');
INSERT INTO Categories (libelleCategorie) VALUES ('Art, antiquités');
INSERT INTO Categories (libelleCategorie) VALUES ('Articles de luxe');
INSERT INTO Categories (libelleCategorie) VALUES ('Beauté, bien-être, parfums');
INSERT INTO Categories (libelleCategorie) VALUES ('Divertissement, DVD, cinéma');
INSERT INTO Categories (libelleCategorie) VALUES ('Électroménager');
INSERT INTO Categories (libelleCategorie) VALUES ('Image, son');
INSERT INTO Categories (libelleCategorie) VALUES ('Immobilier');
INSERT INTO Categories (libelleCategorie) VALUES ('Informatique, Réseaux');
INSERT INTO Categories (libelleCategorie) VALUES ('Instruments de musique');
INSERT INTO Categories (libelleCategorie) VALUES ('Jeux, jouets');
INSERT INTO Categories (libelleCategorie) VALUES ('Jeux vidéos, consoles');
INSERT INTO Categories (libelleCategorie) VALUES ('Livres, BD, revues');
INSERT INTO Categories (libelleCategorie) VALUES ('Maison');
INSERT INTO Categories (libelleCategorie) VALUES ('Monnaies');
INSERT INTO Categories (libelleCategorie) VALUES ('Photos, caméscopes');
INSERT INTO Categories (libelleCategorie) VALUES ('Sports, vacances');
INSERT INTO Categories (libelleCategorie) VALUES ('Téléphonie');
INSERT INTO Categories (libelleCategorie) VALUES ('Véhicules (pièces)');
INSERT INTO Categories (libelleCategorie) VALUES ('Vêtements');
INSERT INTO Categories (libelleCategorie) VALUES ('Vins');

CREATE TABLE Objets (
codeObjet integer,
nomObjet varchar(50),
quantiteObjet integer,
categorie varchar(50),
url varchar(200),
description varchar(500),
prixInitial integer,
prixAchatImmediat integer,
dateDebutEnchere timestamp,
dateFinEnchere timestamp,
statut integer,
CONSTRAINT pk_objets PRIMARY KEY (codeObjet)
);

CREATE TABLE Vendre(
login varchar(50),
codeObjet integer,
CONSTRAINT pk_Vendre PRIMARY KEY (login, codeObjet),
CONSTRAINT fk1_Vendre FOREIGN KEY (login) REFERENCES Users (login),
CONSTRAINT fk2_Vendre FOREIGN KEY (codeObjet) REFERENCES Objets (CodeObjet)
);


CREATE TABLE Encherir(
login varchar(50),
codeObjet integer,
prixEncherit integer,
dateEncherit timestamp,
CONSTRAINT fk1_ench FOREIGN KEY (login) REFERENCES Users (login),
CONSTRAINT fk2_ench FOREIGN KEY (codeObjet) REFERENCES Objets (codeObjet)
);

INSERT INTO Encherir(login, codeObjet, prixEncherit, dateEncherit) VALUES ('toto', '1', '600', CURRENT_TIMESTAMP)
-- CONSTRAINT pk_ench PRIMARY KEY (login, codeObjet),
-- ALTER TABLE Encherir DROP CONSTRAINT pk_ench